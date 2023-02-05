<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    function index()
    {
        return view('services.index',['services'=>Service::all()]);
    }
    function create()
    {
        return view('');
    }
    function delete(Request $request)
    {

    }
    function update(Service $service)
    {

    }


}
