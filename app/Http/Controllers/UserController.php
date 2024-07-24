<?
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }
   
    public function create()
    {
        return view('admin.addUsers');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'user_name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'active' => 'nullable|boolean',
        ]);

        User::create([
            'full_name' => $data['full_name'],
            'user_name' => $data['user_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'active' => isset($data['active']) ? $data['active'] : false,
        ]);

        return redirect('users');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.editUser', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'user_name' => 'required|string|max:255|unique:users,user_name,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'active' => 'nullable|boolean',
        ]);

        $user->update([
            'full_name' => $data['full_name'],
            'user_name' => $data['user_name'],
            'email' => $data['email'],
            'password' => $request->filled('password') ? Hash::make($data['password']) : $user->password,
            'active' => isset($data['active']) ? $data['active'] : $user->active,
        ]);

        return redirect('users');
    }

    public function destroy(Request $request, $id)
    {
        User::where('id', $id)->delete();
        return redirect('users');
    }

    public function trash()
    {
        $trash = User::onlyTrashed()->get();
        return view('admin.trashUser', compact('trash'));
    }

    public function restore($id)
    {
        User::withTrashed()->where('id', $id)->restore();
        return redirect('users.trash');
    }

    public function forceDelete(Request $request, $id)
    {
        User::withTrashed()->where('id', $id)->forceDelete();
        return redirect('users.trash');
    }

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
