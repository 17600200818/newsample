<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    public function __construct() {
        $this->middleware('auth', [
            'only' => ['edit', 'update', 'destroy', 'followers', 'followings']
        ]);

        $this->middleware('guest', [
            'only' => ['create']
        ]);

    }

    public function index() {
//        $users = User::all();
        $users = User::paginate(1);
        return view('users.index', compact('users'));
    }

    public function create() {
        return view('users.create');
    }

    public function show($id) {
        $user = User::findOrFail($id);
        $statuses = $user->statuses()->orderBy('created_at', 'desc')->paginate(30);
        return view('users.show', compact('user','statuses'));
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
            'remember_token' => str_random(10),
        ]);

        $this->sendEmailConfirmationTo($user);

        session()->flash('success', '请登录注册邮箱激活~');
        return redirect()->route('users.show', [$user]);
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        $this->authorize('update', $user);

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

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        session()->flash('success', '成功删除用户！');
        return back();
    }

    public function confirmEmail($token) {
        $user = User::where('activation_token', $token)->firstOrFail();

        $user->activated = true;
        $user->activation = null;
        $user->save();

        Auth::login($user);
        session()->flash('success', '激活成功');
        return redirect()->route('user.show', $user);
    }

    protected function sendEmailConfirmationTo($user)
    {
        $view = 'emails.confirm';
        $data = compact('user');
        $from = 'aufree@estgroupe.com';
        $name = 'Aufree';
        $to = $user->email;
        $subject = "感谢注册 Sample 应用！请确认你的邮箱。";

        Mail::send($view, $data, function ($message) use ($from, $name, $to, $subject) {
            $message->from($from, $name)->to($to)->subject($subject);
        });
    }

    public function followers($id)
    {
      $user = User::findOrFail($id);
      $users = $user->followers()->paginate(30);
      $title = '粉丝';

      return view('users.show_follow', compact('users', 'title'));
    }

    public function followings($id)
    {
      $user = User::findOrFail($id);
      $users = $user->followings()->paginate(30);
      $title = '关注的人';

      return view('users.show_follow', compact('users', 'title'));
    }
}
