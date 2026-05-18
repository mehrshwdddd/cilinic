<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments=Appointment::with('patient')->latest()->paginate(5);
        return view('appointments.index',compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patients = Patient::all();
        return view('appointments.create', compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate([
          'patient_id'=>'required',
          'appointment_date'=>'required,date',
          'appointment_time'=>'required',
      ]);

      $exists=Appointment::where('appointment_date',$request->appointment_date)
          ->where('appointment_time',$request->appointment_time)->exists();

      if($exists)
      {
          return back()->withErrors(['appointment_time'=>'This appointment already exists'])->withInput();
      }

      Appointment::create([
          'patient_id'=>$request->patient_id,
          'appointment_date'=>$request->appointment_date,
          'appointment_time'=>$request->appointment_time,
          'status'=>'pending',
      ]);

      return redirect()->route('appointments.index')
          ->with('success','Appointment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
