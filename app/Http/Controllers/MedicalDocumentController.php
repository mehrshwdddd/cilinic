<?php

namespace App\Http\Controllers;

use App\Models\MedicalDocument;
use App\Models\Patient;
use Illuminate\Http\Request;

class MedicalDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents=MedicalDocument::with('patient')->latest()->paginate(5);
        return view('medical-documents-index',compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patients=Patient::all();
        return view('medical-documents.create',compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'patient_id'=>'required',
            'title'=>'required',
            'file'=>'required|mimes:pdf|max:2048',
        ]);

        $file=$request->file('file')->store('documents','public');

        MedicalDocument::create([
            'patient_id'=>$request->patient_id,
            'title'=>$request->title,
            'file'=>$file,
        ]);

        return redirect()->route('medical-documents.index')
            ->with('success','Medical Document created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MedicalDocument $medicalDocument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MedicalDocument $medicalDocument)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MedicalDocument $medicalDocument)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MedicalDocument $medicalDocument)
    {
        //
    }
}
