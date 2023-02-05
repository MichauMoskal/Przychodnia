<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AppointmentController extends Controller
{
    public function toApprove(Request $request)
    {
        $search = $request->input('search1');

        return view('appointment.approve',[
            'user' => auth()->user() ,
            'appointments' => Appointment::whereHas('service', function($q) use($search) {
                $q->where('title',  'like', '%'.$search.'%');
            })->where('isApproved',0)->orderBy('appointment_date','DESC')->paginate(10),
            'services' => Service::all(),
            'users' => User::where('surname', 'like', '%'.$search.'%')->paginate(5),
        ]);
    }

    public function index(Request $request)
    {
        $search = $request->input('search1');

        return view('appointment.index',[
            'user' => auth()->user() ,
            'appointments' => Appointment::whereHas('service', function($q) use($search) {
                $q->where('title',  'like', '%'.$search.'%');
            })->orderBy('appointment_date','DESC')->paginate(10),
            'services' => Service::all(),
            'users' => User::where('surname', 'like', '%'.$search.'%')->paginate(5),

        ]);
    }

    public function addAppointment(Request $request)
    {
        $formatted_date = str_replace(".", "-", $request->appointment_date);
        $dateTime = $formatted_date." ".$request->appointment_time;

        $user = auth()->user();
        if(Appointment::all()->where('appointment_date',Carbon::parse($dateTime))->count()!=0) {
            if ($user->is_admin == 1)
                return redirect(route('admin.panel'))->with('status', 'that time is already taken');
            else
                return redirect(route('user.panel'))->with('status', 'that time is already taken');
        }
        $approved = 0;
        if($user->is_admin == 1)
            $approved=1;
        $appointment = new Appointment();

        $appointment->service_id = $request->service_id;
        $appointment->user_id = $request->user_id;
        $appointment->isApproved = $approved;
        $appointment->appointment_date = Carbon::parse($dateTime);
        $appointment->save();
        if($user->is_admin == 1)
        return redirect(route('admin.panel'));
        else
            return redirect(route('user.panel'));
    }

    public function planAppointment(User $user)
    {
        return view('appointment.plan',compact('user'),['services' => Service::all(),]);
    }

    public function isPlanned(string $date)
    {
        $appointments = Appointment::all()->whereDate('appointment_date',Carbon::parse($date));
        return $appointments;
    }

    public function approve(Request $request)
    {
        $appointment = Appointment::find($request->id);
        $appointment->isApproved = 1;
        $appointment->save();
        return redirect(route('appointment.toApprove'));
    }
}
