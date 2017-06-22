<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StatusesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['store', 'destroy']]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'max:255|min:6|required'
        ]);

        Auth::user()->statuses()->create([
            'content' => $request->content
        ]);
        return redirect()->back();
    }
}