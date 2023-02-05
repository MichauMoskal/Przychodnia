<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
//        $search = $request->input('search');

        return view('user.index',[
            'appointments' => Appointment::where('user_id', auth()->user()->id)->paginate(5),
            'user' => auth()->user(),
            'services' => Service::all(),
        ]);

//
//        $fields= Field::where('name', 'like', '%'.$search.'%')->orderBy('required_points','DESC')->paginate(10);
//        return view('field.index', ['fields' => $fields]);


    }
     public function addAppointment(Request $request)
    {
        $request->validate([ 'appointment_date'=>'required|string']);



        $appointment = new Appointment();
        $appointment->service_id = $request->service_id;
        $appointment->user_id = $request->user_id;
        $appointment->appointment_date =  Carbon::parse($request->appointment_date);
        $appointment->save();
        return redirect(route('user.panel') );
    }
    //update user
    public function updateUser(Request $request)
    {
        $request->validate(['name'=>'required|string', 'surname'=>'required|string', 'phone'=>'required|numeric|digits:9',
            'email'=>'required', 'address'=>'required|string']);


        $user = auth()->user();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->save();
        return redirect(route('user.panel') );
    }

}
