<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class NoneController extends Controller
{
    public function index()
    {
        return view('none.index',[
            'services' => Service::all(),
        ]);
    }
    public function about()
    {
        return view('none.about');
    }
}
