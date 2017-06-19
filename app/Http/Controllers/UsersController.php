<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct() {
        $this->middleware('auth', [
            'only' => ['edit', 'update']
        ]);

        $this->middleware('guest', [
            'only' => ['create']
        ]);

    }

    public function index() {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create() {
        return view('users.create');
    }

    public function show($id) {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email|unique:users',
            'password' => 'confirmed',
        ]);

        $user = User::create( [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::login($user);
        session()->flash('success', '欢迎，您将在这里开启一段新的旅程~');
        return redirect()->route('users.show', [$user]);
    }

    public function edit($id) {
        $user = User::findOrFail($id);
//        $this->authorize('update', $user);

        return view('users.edit', compact('user'));
    }

    public function update($id, Request $request) {


        $this->validate($request, [
            'name' => 'required|max:50',
            'password' => 'confirmed|min:6'
        ]);

        $user = User::findOrFail($id);
//        $this->authorize('update', $user);

        $data = ['name' => $request->name];
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);

        session()->flash('success', '成功更新个人信息');
        return redirect()->route('users.show', $id);
    }

}