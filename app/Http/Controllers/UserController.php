<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {

        $sort = $request->get('sort', 'id');
        $order = $request->get('order', 'asc');
    
        $users = User::orderBy($sort, $order)->get();

        return view('users.index', compact('users', 'order'));
    }

    public function store(Request $request)
    {
        User::create($request->all());
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }
    
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->is_admin = $request->has('is_admin');
        $user->save();

        return redirect()->route('users.index');
    }

    public function destroy(Request $request)
    {
        $user = user::find($request->get('id'));
        $user->delete();
        return redirect()->route('users.index');
    }
}
