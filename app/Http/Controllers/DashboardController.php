<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Pengunjungweb;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
  
    public function index()
    {
     $totalPengunjung = Pengunjungweb::sum('pengunjung');

    // Hari ini
    $today = Pengunjungweb::whereDate('tanggal', today())->sum('pengunjung');

    // Minggu ini
    $thisWeek = Pengunjungweb::whereBetween('tanggal', [now()->startOfWeek(), now()->endOfWeek()])
        ->sum('pengunjung');

    // Bulan ini
    $thisMonth = Pengunjungweb::whereMonth('tanggal', now()->month)
        ->whereYear('tanggal', now()->year)
        ->sum('pengunjung');

    // Chart data (tetap sama seperti sebelumnya)
    $perHari = Pengunjungweb::select(
        DB::raw('DATE(tanggal) as tgl'),
        DB::raw('SUM(pengunjung) as total')
    )
    ->where('tanggal', '>=', now()->subDays(7))
    ->groupBy('tgl')
    ->orderBy('tgl', 'ASC')
    ->get();

    $perMinggu = Pengunjungweb::select(
        DB::raw('YEARWEEK(tanggal) as minggu'),
        DB::raw('SUM(pengunjung) as total')
    )
    ->where('tanggal', '>=', now()->subWeeks(4))
    ->groupBy('minggu')
    ->orderBy('minggu', 'ASC')
    ->get();

    $perBulan = Pengunjungweb::select(
        DB::raw('DATE_FORMAT(tanggal, "%Y-%m") as bulan'),
        DB::raw('SUM(pengunjung) as total')
    )
    ->where('tanggal', '>=', now()->subMonths(12))
    ->groupBy('bulan')
    ->orderBy('bulan', 'ASC')
    ->get();

    return view('admin.dashboard', compact(
        'totalPengunjung', 'today', 'thisWeek', 'thisMonth',
        'perHari','perMinggu','perBulan'
    ));
    }
}
