<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all users from the database
        $users = User::all();

        // Pass the users to the view
        return view('admin.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addUsers');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'user_name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'active' => 'sometimes|boolean'
        ]);

        // Create a new user
        $user = new User();
        $user->full_name = $validated['full_name'];
        $user->user_name = $validated['user_name'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->active = $request->has('active');
        $user->save();

        // Redirect to users list with success message
        return redirect()->route('users')->with('success', 'User added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.showUsers', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
  
        return view('admin.editUser',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'user_name' => 'required|string|max:255|unique:users,user_name,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'active' => 'nullable|boolean',
        ]);

        // Update user data
        $user->full_name = $validatedData['full_name'];
        $user->user_name = $validatedData['user_name'];
        $user->email = $validatedData['email'];
        $user->active = $request->has('active');

        if ($request->filled('password')) {
            $user->password = Hash::make($validatedData['password']);
        }

        $user->save();

        // Redirect back to users list with success message
        return redirect()->route('users')->with('success', 'User updated successfully');
    }
   /**
     * Display a listing of the trashed categories.
     */
    public function trash()
    {
        // Fetch all trashed users
        $trash = User::onlyTrashed()->get();
        return view('admin.trashUser', compact('trash'));
    }
 
    /**
     * Restore the specified trashed category.
     */
    public function restore(string $id)
    {
        // Restore the trashed category
        User::withTrashed()->where('id', $id)->restore();
       
        return redirect('users.trash');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // Soft delete the category
        $id = $request->id;
        User::where('id',$id)->delete();
        
        // Redirect with success message
        return redirect('users');
    }

    /**
     * Permanently delete the specified trashed user.
     */
    public function forceDelete(Request $request)
    {
        // Permanently delete the trashed category
        $id = $request->id;
        User::withTrashed()->where('id', $id)->forceDelete();
        return redirect('users.trash');
    }
}
