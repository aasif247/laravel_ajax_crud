<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::get();
        $roles = Roles::get();
//        return response()->json($users);

        return view('dashboard',compact('users','roles'));
//        return view('dashboard_old',compact('users','roles'));
//        return view('user',compact('users','roles'));

    }
}
