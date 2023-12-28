<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }
    public function edit()
    {
        return view('users.edit',['user'=>User::all()->where('id','=',Auth::user()->id)]);
    }
    public function store()
    {

    }
}
