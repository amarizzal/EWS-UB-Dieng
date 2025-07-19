<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EwsRecord;

class DashboardController extends Controller
{
    public function index() {
        
        return view('dashboard');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'medic_number' => 'required',
            'score_1' => 'required',
            'score_2' => 'required',
            'score_3' => 'required',
            'score_4' => 'required',
            'score_5' => 'required',
        ]);

        $ews = EwsRecord::create([
            'name' => $request->name,
            'medic_number' => $request->medic_number,
            'score_1' => $request->score_1,
            'score_2' => $request->score_2,
            'score_3' => $request->score_3,
            'score_4' => $request->score_4,
            'score_5' => $request->score_5,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('dashboard')->with('success', 'EWS record created successfully');
    }
}
