<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EwsRecord;

class RecordController extends Controller
{
    public function index() {
        $ewsRecords = EwsRecord::orderBy('created_at', 'desc')->with('user')->get();
        return view('record.index', compact('ewsRecords'));
    }
}
