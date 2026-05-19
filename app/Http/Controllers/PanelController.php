<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalDocument;
use App\Models\Patient;
use App\Models\Appointment;

class PanelController extends Controller
{
    public function index()
    {
        if(auth()->user()->isDoctor())
        {
            $appointments = Appointment::latest()->paginate(5);
            return view('doctor.dashboard', compact('appointments'));
        }
        $patientsCount = Patient::count();
        $appointmentsCount = Appointment::count();
        $pendingAppointments = Appointment::where('status', 'pending')->count();

        $documentsCount = MedicalDocument::count();
        $latestAppointments = Appointment::with('patient')->latest()->take(5)->get();

        return view('front.panel.index', compact('patientsCount', 'appointmentsCount',
            'pendingAppointments',
            'documentsCount',
            'latestAppointments'

        ));
    }
}
