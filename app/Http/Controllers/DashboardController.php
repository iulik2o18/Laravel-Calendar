<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Dashboard;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $appointments = Appointment::latest()->paginate(5);

        return view('appointments.index', compact('appointments'))
        ->with('i', (request()->input('page', 1)-1)*5);
    }

    public function create(){
        return view('appointments.create');
    }

    public function store(Request $request){

        $request->validate([
            'start_time' => 'required',
            'finish_time' => 'required',
            'client_name' => 'required',
            'employee_id' => 'required'
        ]);

        Dashboard::create($request->all());

        return redirect()->route('appointments.store')->with('succes', 'Appointment has been added');
        
    }

    public function show(Dashboard $dashboard){

        return view('appointments.show', [compact('dashboard')]);
    }

    public function edit($id){

        $appointment = Appointment::find($id);

        $employees = DB::table('employees')->select('id', 'name')->get();

        return view('appointments.edit', compact('appointment', 'employees'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'start_time' => 'required',
            'client_name' => 'required',
            'employee_id' => 'required'
        ]);

        $appointment = Appointment::find($id);

        $appointment->start_time = $request->get('start_time');
        $appointment->client_name = $request->get('client_name');
        $appointment->employee_id = $request->get('employee_id');
        $appointment->save();

        return redirect('/appointments')->with('succes', 'Appointment has been updated');
        
    }

    public function destroy($id){

        $appointment = Appointment::find($id);
        $appointment->delete();

        return redirect('/appointments')->with('succes', 'Appointment has been removed');
    }
}
