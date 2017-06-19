<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create() {
        return view('sessions.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials, $request->has('remember'))) {
            session()->flash('success', '登陆成功');
            return redirect()->intended(route('users.show', [Auth::user()]));
        }else {
            session()->flash('danger', '用户名密码不匹配');
            return redirect()->back();
        }
    }

    public function destroy() {
        Auth::logout();
        session()->flash('success', '退出成功');
        return redirect('login');
    }
}
