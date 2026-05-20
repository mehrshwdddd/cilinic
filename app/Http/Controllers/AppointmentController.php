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
    public function index(Request $request)
    {
        $appointments = Appointment::with('patient')

            ->when($request->status, function($query) use ($request){
                $query->where('status', $request->status);})
            ->when($request->search, function($query) use ($request){
                $query->whereHas('patient', function($q) use ($request){
                    $q->where('first_name', 'like', '%'.$request->search.'%'
                    )->orWhere('last_name', 'like', '%'.$request->search.'%')
                        ->orWhere('national_code', 'like', '%'.$request->search.'%');
                });
            })->latest()->paginate(5);
        return view('front.panel.appointments.index',compact('appointments'));
    }

    public function updatestatus(Request $request,Appointment $appointment)
    {
          $request->validate([
              'status'=>'required|in:pending,approved,cancelled'
          ]);
          $appointment->update([
              'status'=>$request->status
          ]);
          return back()->with('success','Appointment status updated successfully');
    }
    public function reports(Request $request)
    {
        $appointments = Appointment::with('patient')

            ->when($request->status, function($query) use ($request){
                $query->whereIn('status', $request->status);
            })

            ->when($request->from_date, function($query) use ($request){

                $query->whereDate('appointment_date', '>=', $request->from_date);
            })
            ->when($request->to_date, function($query) use ($request){

                $query->whereDate('appointment_date', '<=', $request->to_date);
            })
            ->when($request->patient, function($query) use ($request){

                $query->whereHas('patient', function($q) use ($request){
                    $q->where('first_name', 'like', '%'.$request->patient.'%')
                        ->orWhere('last_name', 'like', '%'.$request->patient.'%')
                        ->orWhere('national_code', 'like', '%'.$request->patient.'%');
                });
            })->latest()->paginate(10);

        return view('front.panel.appointments.reports', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'national_code' => 'required',
            'phone_number' => 'required',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
        ]);

        $exists = Appointment::where('appointment_date', $request->appointment_date)
            ->where('appointment_time', $request->appointment_time)
            ->exists();

        if ($exists) {
            return back()->withErrors(['appointment_time' => 'This appointment already exists'])->withInput();
        }

        $patient = Patient::firstOrCreate(
            [
                'national_code' => $request->national_code
            ],
            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
            ]
        );

        Appointment::create([
            'patient_id' => $patient->id,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Appointment created successfully.');
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
        $appointment->delete();
        return back()->with('success','Appointment deleted successfully');
    }
}
