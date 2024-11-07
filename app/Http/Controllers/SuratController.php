<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Surat;
use App\Exports\SuratExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class SuratController extends Controller
{
    public function index(Request $request)
    {
        $query = Surat::query();

        // Filter berdasarkan bulan dan tahun
        if ($request->filled('month') && $request->filled('year')) {
            $query->whereMonth('tanggal_diterima', $request->month)
                ->whereYear('tanggal_diterima', $request->year);
        }

        // Filter berdasarkan pencarian
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('no_register', 'LIKE', "%$search%")
                    ->orWhere('tanggal_diterima', 'LIKE', "%$search%")
                    ->orWhere('asal_surat', 'LIKE', "%$search%")
                    ->orWhere('nomor_surat', 'LIKE', "%$search%")
                    ->orWhere('perihal', 'LIKE', "%$search%")
                    ->orWhere('ditujukan', 'LIKE', "%$search%");
            });
        }

        // Hitung total surat
        $totalSurat = Surat::count();

        // Paginate hasil pencarian atau filter
        $surats = $query->paginate(10);

        return view('surats.index', compact('surats', 'totalSurat'));
    }


    public function create()
    {
        return view('surats.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_register' => 'required|numeric|unique:surats',
            'tanggal_diterima' => 'required|date',
            'asal_surat' => 'required',
            'nomor_surat' => 'required|unique:surats',
            'perihal' => 'required',
            'ditujukan' => 'required',
            'file_surat' => 'file|mimes:pdf|max:2048'
        ]);

        $filePath = null;
        if ($request->hasFile('file_surat')) {
            $filePath = $request->file('file_surat')->store('surats', 'public');
        }

        Surat::create([
            'no_register' => $request->no_register,
            'tanggal_diterima' => $request->tanggal_diterima,
            'asal_surat' => $request->asal_surat,
            'nomor_surat' => $request->nomor_surat,
            'perihal' => $request->perihal,
            'ditujukan' => $request->ditujukan,
            'tanggal_diteruskan' => $request->tanggal_diteruskan,
            'keterangan' => $request->keterangan,
            'file_path' => $filePath,
        ]);

        return redirect()->route('surats.index')->with('success', 'Surat berhasil ditambahkan');
    }

    public function show($id)
    {
        $surat = Surat::findOrFail($id);
        return view('surats.show', compact('surat'));
    }


    public function edit(Surat $surat)
    {
        return view('surats.edit', compact('surat'));
    }

    public function update(Request $request, Surat $surat)
    {
        $request->validate([
            'no_register' => 'required|numeric|unique:surats,no_register,' . $surat->id,
            'tanggal_diterima' => 'required|date',
            'asal_surat' => 'required',
            'nomor_surat' => 'required|unique:surats,nomor_surat,' . $surat->id,
            'perihal' => 'required',
            'ditujukan' => 'required',
            'file_surat' => 'file|mimes:pdf|max:2048'
        ]);

        if ($request->hasFile('file_surat')) {

            if ($surat->file_path) {
                Storage::disk('public')->delete($surat->file_path);
            }

            $surat->file_path = $request->file('file_surat')->store('surats', 'public');
        }

        $surat->update([
            'no_register' => $request->no_register,
            'tanggal_diterima' => $request->tanggal_diterima,
            'asal_surat' => $request->asal_surat,
            'nomor_surat' => $request->nomor_surat,
            'perihal' => $request->perihal,
            'ditujukan' => $request->ditujukan,
            'tanggal_diteruskan' => $request->tanggal_diteruskan,
            'keterangan' => $request->keterangan,
            'file_path' => $surat->file_path,
        ]);

        return redirect()->route('surats.index')->with('success', 'Surat berhasil diperbarui');
    }


    public function destroy(Surat $surat)
    {
        try {
            if ($surat->file_path) {
                Storage::disk('public')->delete($surat->file_path);
            }
            $surat->delete();

            return redirect()->route('surats.index')->with('success', 'Surat berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('surats.index')->with('error', 'Gagal menghapus surat: ' . $e->getMessage());
        }
    }

    public function export(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

        // Cek apakah ada data yang sesuai dengan filter bulan dan tahun
        $data = Surat::whereYear('tanggal_diterima', $year)
            ->whereMonth('tanggal_diterima', $month)
            ->get();

        if ($data->isEmpty()) {
            // Jika tidak ada data, redirect dengan notifikasi
            return redirect()->back()->with('error', 'Data tidak ditemukan untuk bulan dan tahun yang dipilih.');
        }

        // Jika ada data, lakukan export
        return Excel::download(new SuratExport($month, $year), 'Rekap Penerimaan Berita Sanapati.xlsx');
    }
}
