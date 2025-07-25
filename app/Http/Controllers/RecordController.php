<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EwsRecord;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EwsExport;

class RecordController extends Controller
{
    public function index() {
        $ewsRecords = EwsRecord::orderBy('created_at', 'desc')->with('user')->get();
        return view('record.index', compact('ewsRecords'));
    }

    public function destroy(EwsRecord $record) {
        $record->delete();
        return redirect()->route('record.index')->with('success', 'Data berhasil dihapus');
    }

    public function export() {
        $date = Carbon::now()->format('d-m-Y');
        return Excel::download(new EwsExport(), 'ews-records-'.$date.'.xlsx');
    }
}
