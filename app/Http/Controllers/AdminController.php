<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $search1 = $request->input('search1');

        return view('admin.index',[
            'user' => auth()->user() ,
            'appointments' => Appointment::whereHas('service', function($q) use($search) {
                $q->where('title',  'like', '%'.$search.'%');
            })->paginate(10),
            'services' => Service::all(),
            'users' => User::where('surname', 'like', '%'.$search.'%')->paginate(5),

        ]);
    }

//$fields= Field::where('name', 'like', '%'.$search.'%')->orderBy('required_points','DESC')->paginate(10);
//        return view('field.index', ['fields' => $fields]);

//and 'name', 'like', '%'.$search.'%'


    public function deleteAppointment(Request $request)
    {
        $appointment = Appointment::find($request->id);
        $appointment->delete();
        return redirect(route('appointments'));
    }

    public function deleteUser(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        return redirect(route('admin.panel'));
    }

    //addApointment

//    public function addAppointment(Request $request)
//    {
//        $request->validate(['title'=>'required|string', 'appointment_date'=>'required|string']);
//
//        $appointment = new Appointment();
//
//        $appointment->service_id = $request->service_id;
//        $appointment->user_id = $request->user_id;
//        $appointment->appointment_date = Carbon::parse($request->appointment_date);
//        $appointment->save();
//        return redirect(route('admin.panel'));
//    }
    public function updateUser(Request $request)
    {
        $request->validate(['name'=>'required|string', 'surname'=>'required|string', 'email'=>'required','phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address'=>'required|string|']);

        $user = auth()->user();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->save();
        return redirect(route('admin.panel') );
    }

    //TODO: add accept/or edit appointment
    public function acceptAppointment(Request $request)
    {
        $appointment = Appointment::find($request->id);
        $appointment->user_id = $request->user_id;
        $appointment->is_accepted = $request->user_id;

        $appointment->appointment_date =  Carbon::parse( $request->appointment_date);
        $appointment->save();
        return redirect(route('admin.panel'));
    }



        //TODO:do tego trzeba routea zrobić chyba nwmiem
    public function searchAppointment(Request $request)
    {
        $appointment = Appointment::where('title', 'like', '%' . $request->search . '%')->get();
        return view('admin.index', compact('appointment')); //
    }
}
