<?php

namespace App\Http\Controllers;
use App\Models\User; 
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
{
    $users = User::all(); // get all users from DB
    $user = User::withTrashed()->get();
    return view('user.index', compact('users'));
}

public function create()
{
    return view('user.create');
    
}

public function add()
{
    return view('user.add');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed|min:8',
        'phone' => 'nullable|string|unique:users',
        'role' => 'required|string',
    ]);

    $validated['password'] = bcrypt($validated['password']);

    User::create($validated);

    return redirect()->route('user.index')->with('success', 'User created successfully!');
    
}

public function edit($id)
{
    $user = User::findOrFail($id);
    return view('user.edit', compact('user'));
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        'password' => 'nullable|string|min:8|confirmed',
        'phone' => 'nullable|string',
        'role' => 'required|string',
    ]);

    $user = User::findOrFail($id);
    $user->name = $validated['name'];
    $user->email = $validated['email'];
    $user->phone = $validated['phone'];
    $user->role = $validated['role'];
    if ($validated['password']) {
        $user->password = bcrypt($validated['password']);
    }
    $user->save();

    return redirect()->route('user.index')->with('success', 'User updated successfully.');
}

public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->route('user.index')->with('success', 'User deleted successfully.');
}


}

