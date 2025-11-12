<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role:admin']); // hanya admin
    }

    public function index()
    {
        $users = User::paginate(15);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:191',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|confirmed',
            'role'=>'required|in:admin,user',
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>$request->role,
        ]);

        return redirect()->route('admin.users.index')->with('success','User created.');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=>'required|max:191',
            'email'=>'required|email|unique:users,email,'.$user->id,
            'password'=>'nullable|min:6|confirmed',
            'role'=>'required|in:admin,user',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('admin.users.index')->with('success','User updated.');
    }

    public function destroy(User $user)
    {
        // jangan hapus diri sendiri (opsional)
        if (auth()->id() === $user->id) {
            return back()->with('error','You cannot delete yourself.');
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('success','User deleted.');
    }
}
