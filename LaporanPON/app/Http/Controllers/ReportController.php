<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'time_start' => 'required',
            'time_finish' => 'required',
            'km_start' => 'required|integer',
            'km_finish' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        // Tambahkan user_id dari pengguna yang sedang login
        $validated['user_id'] = Auth::id();

        // Simpan data ke dalam tabel
        Report::create($validated);

        return redirect()->back()->with('success', 'Report saved successfully.');
    }

    public function index(Request $request)
    {
        // Ambil input pencarian dari query string
        $user = $request->input('user');
        $month = $request->input('month');

        // Query untuk filter data
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

        // Kembalikan view dengan data yang sudah difilter
        return view('reports.index', compact('reports'));
    }
}




