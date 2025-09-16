<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Pegawai;


class LandingController extends Controller
{
    //

    public function index()
    {
        $slider= DB::table('foto_dashboard')->orderBy('urutan','desc')->get();
        $misi=DB::table('misis')->get();
        $visi=DB::table('visis')->get();
        $moto=DB::table('motos')->get();
        $jumlah_dokter=DB::table('dokter')->count();
       $jumlah_kesehatan = DB::table('pegawai')
    ->where('jabatan', 'Tenaga Kesehatan')
    ->count();

$jumlah_penunjang = DB::table('pegawai')
    ->where('jabatan', 'Tenaga Penunjang Kesehatan')
    ->count();

$jumlah_adm = DB::table('pegawai')
    ->where('jabatan', 'Tenaga ADM/Umum')
    ->count();


        return view('landing',compact('slider','misi','visi','moto','jumlah_dokter','jumlah_kesehatan','jumlah_penunjang','jumlah_adm'));
    }

    public function sejarah()
    {
        $data_sejarah=DB::table('sejarahs')->get();
        return view('landing.sejarah',compact('data_sejarah'));
    }

    public function visi()
    {
        $data_visi=DB::table('visis')->get();
        return view('landing.visi',compact('data_visi'));
    }

    public function struktur()
    {
        $data_struktur=DB::table('strukturs')->get();
        return view('landing.struktur',compact('data_struktur'));
    }

    public function ugd()
    {
        $data_ugd=DB::table('ugd')->get();
        return view('landing.ugd',compact('data_ugd'));
    }

    public function rawatjalan()
    {
        $rawat_jalan = DB::table('rawat_jalan')
            ->join('dokter', 'rawat_jalan.dokter_id', '=', 'dokter.id')
            ->join('poli', 'dokter.poli_id', '=', 'poli.id')
            ->select('poli.id', 'poli.nama_poli', 'poli.keterangan', 'poli.img')
            ->distinct()
            ->get();

        return view('landing.rawatjalan', compact('rawat_jalan'));
    }

    public function detailPoli($id)
    {
        $poli = DB::table('poli')->where('id', $id)->first();

        $dokter = DB::table('dokter')
            ->where('poli_id', $id)
            ->get();

        return view('landing.detailpoli', compact('poli', 'dokter'));
    }

    public function jadwalDokter($id)
    {
        $jadwal = DB::table('jadwal_dokter')
            ->where('dokter_id', $id)
            ->get();

        return response()->json($jadwal);
    }

     public function penunjang()
    {
        $data_penunjang=DB::table('penunjang')->get();
        return view('landing.penunjang',compact('data_penunjang'));
    }

    public function berita()
    {
        $berita = DB::table('berita')
            ->join('pegawai', 'berita.author', '=', 'pegawai.id')
            ->select('berita.*', 'pegawai.nama as author_name')
            ->orderBy('berita.tgl_publish', 'desc')
            ->get();

        return view('landing.berita', compact('berita'));
    }

    public function show($id)
    {
        $berita = DB::table('berita')
            ->join('pegawai', 'berita.author', '=', 'pegawai.id')
            ->select('berita.*', 'pegawai.nama as author_name')
            ->where('berita.id', $id)
            ->first();

        if (!$berita) {
            abort(404);
        }

        return view('landing.berita_show', compact('berita'));
    }

    public function indmutu()
    {
        $indmutu=DB::table('img')->get();
        return view('landing.indmutu',compact('indmutu'));
    }

    public function standarp()
    {
        $standarp=DB::table('img')->get();
        return view('landing.standarp',compact('standarp'));
    }

    public function pimpinan()
    {
        $pimpinan = DB::table('pegawai')
            ->where('jabatan', 'Pimpinan')
            ->get();

        return view('landing.pimpinan', compact('pimpinan'));
    }

    public function tenagamedis(Request $request)
    {
        if ($request->ajax()) {
            $tenagamedis = DB::table('pegawai')
                ->where('jabatan', 'Tenaga Medis')
                ->select('nama', 'jk', 'detail_jabatan');

            return DataTables::of($tenagamedis)
                ->addIndexColumn()
                ->make(true);
        }

        return view('landing.tenagamedis');
    }

    public function tenagakesehatan(Request $request)
    {
        if ($request->ajax()) {
            $tenagakesehatan = DB::table('pegawai')
                ->where('jabatan', 'Tenaga Kesehatan')
                ->select('nama', 'jk', 'detail_jabatan');

            return DataTables::of($tenagakesehatan)
                ->addIndexColumn()
                ->make(true);
        }

        return view('landing.tenagakesehatan');
    }

    public function tpk(Request $request)
    {
        if ($request->ajax()) {
            $tpk = DB::table('pegawai')
                ->where('jabatan', 'Tenaga Penunjang Kesehatan')
                ->select('nama', 'jk', 'detail_jabatan');

            return DataTables::of($tpk)
                ->addIndexColumn()
                ->make(true);
        }

        return view('landing.tpk');
    }

    public function tau(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('pegawai')
                ->where('jabatan', 'Tenaga ADM/Umum')
                ->select('nama', 'jk', 'detail_jabatan');

            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        return view('landing.tau');
    }

    public function inovasi(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('inovasi')
                ->select('judul', 'tahun', 'tahapan', 'bentuk');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('file', function ($row) {
                if ($row->file) {
                    $url = asset('file_inovasi/' . $row->file);
                    $namaFile = basename($row->file);
                    return '<a href="'.$url.'" target="_blank">'.$namaFile.'</a>';
                } else {
                    return '<span class="text-muted">Belum ada file</span>';
                }
            })
                ->rawColumns(['file'])
                ->make(true);
        }

        return view('landing.inovasi');
    }

    public function pengaduan()
    {
        return view('landing.pengaduan');
    }
}
