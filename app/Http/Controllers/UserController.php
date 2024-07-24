<?
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
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
        $messages = $this->errMsg();
        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'user_name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'active' => 'nullable|boolean',
            'role' => 'required|string', // Ensure role is required
        ], $messages);

        // Create the user
        User::create([
            'full_name' => $data['full_name'],
            'user_name' => $data['user_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'active' => isset($data['active']) ? 1 : 0,
            'role' => $data['role'],
        ]);

        return redirect()->route('users')->with('success', 'User added successfully.');
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
        return view('admin.editUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
 
        // Validate the request
        $this->validator($request->all(), $user->id)->validate();
 
        // Update user data
        $user->full_name = $request->full_name;
        $user->user_name = $request->user_name;
        $user->email = $request->email;
 
        // Update password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
 
        // Update active status
        $user->active = $request->has('active') ? 1 : 0;
 
        $user->save();
 
        return redirect()->route('users')->with('success', 'User updated successfully.');
    }
 
    protected function validator(array $data, $userId)
    {
        return Validator::make($data, [
            'full_name' => ['required', 'string', 'max:255'],
            'user_name' => ['required', 'string', 'max:255', 'unique:users,user_name,' . $userId],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $userId],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Display a listing of the trashed users.
     */
    public function trash()
    {
        $trash = User::onlyTrashed()->get();
        return view('admin.trashUser', compact('trash'));
    }

    /**
     * Restore the specified trashed user.
     */
    public function restore(string $id)
    {
        User::withTrashed()->where('id', $id)->restore();
        return redirect()->route('users.trash')->with('success', 'User restored successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        User::where('id', $id)->delete();
        return redirect()->route('users')->with('success', 'User deleted successfully');
    }

    /**
     * Permanently delete the specified trashed user.
     */
    public function forceDelete(Request $request)
    {
        $id = $request->id;
        User::withTrashed()->where('id', $id)->forceDelete();
        return redirect()->route('users.trash')->with('success', 'User permanently deleted');
    }

    /**
     * Get validation error messages.
     */
    public function errMsg()
    {
        return [
            'full_name.required' => 'The full name is required',
            'user_name.required' => 'The username is required',
            'user_name.unique' => 'The username has already been taken',
            'email.required' => 'The email is required',
            'email.email' => 'The email must be a valid email address',
            'email.unique' => 'The email has already been taken',
            'password.required' => 'The password is required',
            'password.confirmed' => 'The password confirmation does not match',
            'password.min' => 'The password must be at least 6 characters long',
            'role.required' => 'The role is required',
        ];
    }
}