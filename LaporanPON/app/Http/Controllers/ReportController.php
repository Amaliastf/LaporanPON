<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    // Method untuk menyimpan data
    public function store(Request $request)
{
    // Validasi data
    $validated = $request->validate([
        'tanggal' => 'required|date',
        'time_start' => 'required',
        'km_start' => 'required|integer',
        'description' => 'nullable|string',
    ]);

    // Tambahkan user_id dari pengguna yang sedang login
    $validated['user_id'] = Auth::id();

    // Time finish dan KM finish akan dibiarkan kosong untuk saat ini
    $validated['time_finish'] = null;
    $validated['km_finish'] = null;

    // Simpan data ke dalam tabel
    Report::create($validated);

    return redirect()->back()->with('success', 'Report saved successfully.');
}


    // Method untuk menampilkan data dengan filter
    public function index(Request $request)
{
    $user = $request->input('user');
    $month = $request->input('month');

    $reports = Report::with('user')
        ->when($user, function ($query, $user) {
            $query->whereHas('user', function ($q) use ($user) {
                $q->where('name', 'like', '%' . $user . '%');
            });
        })
        ->when($month, function ($query, $month) {
            $query->whereMonth('tanggal', '=', date('m', strtotime($month)))
                  ->whereYear('tanggal', '=', date('Y', strtotime($month)));
        })
        ->get();

    return view('reports.index', compact('reports'));
}


    // Method untuk menampilkan form edit laporan
    public function edit($id)
    {
        $report = Report::findOrFail($id);

        return view('reports.edit', compact('report'));
    }

    // Method untuk update laporan
    public function update(Request $request, $id)
    {
        $report = Report::findOrFail($id);

        if ($report->user_id !== Auth::id()) {
            return redirect()->route('reports.index')->with('error', 'You are not authorized to edit this report.');
        }

        // Validasi data
        $validated = $request->validate([
            'time_finish' => 'required',
            'km_finish' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $validated['user_id'] = Auth::id();

        // Update hanya field yang diizinkan
        $report->update($validated);

        return redirect()->route('reports.index')->with('success', 'Report updated successfully.');
    }
}
