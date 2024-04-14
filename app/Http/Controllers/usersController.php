<?php

namespace App\Http\Controllers;

use App\Models\admin\users;
use Illuminate\Http\Request;

class usersController extends Controller
{
    public function index()
    {
        $users = users::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        users::create($request->all());

        return redirect()->route('users')
            ->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = users::findOrFail($id); // Tìm user theo id
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = users::findOrFail($id); // Tìm user theo id

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($request->all());

        return redirect()->route('users')
            ->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = users::findOrFail($id); // Sử dụng User model và phương thức findOrFail để tìm user theo ID

        $user->delete();

        return redirect()->route('users')
            ->with('success', 'User deleted successfully');
    }
}
