<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profileIndex()
    {
        // $user = new User;
        // $users = $user->all();
        $users = Auth::user();

        return view('profileedit',[
            'user'=> $users,
        ]);
    }
}
