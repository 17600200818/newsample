<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FollowersController extends Controller
{
    public function store($id)
    {
      if ($id == Auth::user()) {
        return redirect('/');
      }

      if (!Auth::user()->isFollowing($id)) {
        Auth::user()->follow((int)$id);
      }

      return redirect()->route('users.show', $id);
    }

    public function destroy($id)
    {
      if ($id == Auth::user()) {
        return redirect('/');
      }

      if (Auth::user()->isFollowing($id)) {
        Auth::user()->unFollow($id);
      }

      return redirect()->route('users.show', $id);
    }
}
