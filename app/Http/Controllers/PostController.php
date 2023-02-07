<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function store(Request $request) {

        $appointment = Appointment::create([
            'start_time' => $request->start_time,
            'finish_time' => date('Y-m-d H:i', strtotime($request->start_time. ' + 1 hours')) ,
            'comments' => $request->comments,
            'client_name' => $request->client_name,
            'employee_id' => $request->employee_id

        ]);

        $appointment->save();

        return redirect('/')->with('status','Added to calendar');
    }
}
