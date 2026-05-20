<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        $setting = Setting::first();

        return view('front.panel.setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([

            'clinic_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        Setting::updateOrCreate(['id' => 1],
            [
                'clinic_name' => $request->clinic_name,
                'phone' => $request->phone,
                'address' => $request->address,
                'map_lat' => $request->map_lat,
                'map_lng' => $request->map_lng,
            ]

        );

        return back()->with('success', 'Settings Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
