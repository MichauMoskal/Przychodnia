<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectUsers extends Controller
{

    public function index()
    {

        if (auth()->user()->is_admin == true) {
            return redirect()->route('admin.panel');
        } elseif (auth()->user()->is_admin == false) {
            return redirect()->route('user.panel');
        } else {
            return auth()->logout();
        }
    }
}
