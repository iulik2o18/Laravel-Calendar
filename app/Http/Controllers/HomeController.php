<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $events = [];

        $appointments = Appointment::with('employee')->get();

        foreach($appointments as $appointment){
            $events [] = [
                'title' => $appointment->client_name. '('. $appointment->employee->name . ')',
                'start' => $appointment->start_time,
                'end' => $appointment->finish_time,
            ];
        }

        $employees = DB::table('employees')->select('id', 'name')->get();

        return view('home', compact('events','employees'));
    }
}
