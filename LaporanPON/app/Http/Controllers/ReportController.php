<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'tanggal' => 'required|date',  // Pastikan tanggal ada dan valid
            'time_start' => 'required',
            'time_finish' => 'required',
            'km_start' => 'required|integer',
            'km_finish' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        // Simpan data ke dalam tabel
        Report::create($validated);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Report saved successfully.');
    }
}



