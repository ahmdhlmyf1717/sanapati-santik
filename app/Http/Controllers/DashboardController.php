<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Menampilkan halaman dashboard
    public function index()
    {
        $totalSurat = Surat::count();
        return view('dashboard.index', compact('totalSurat'));
    }
}
