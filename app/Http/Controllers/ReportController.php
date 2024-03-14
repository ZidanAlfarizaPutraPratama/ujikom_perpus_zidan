<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

class ReportController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::all();
        return view('report.index', ['peminjaman' => $peminjaman]);
    }
}
