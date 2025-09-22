<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Pegawai;
use Carbon\Carbon;
use App\Models\Pengunjungweb;
use Illuminate\Support\Facades\Crypt;
use App\Models\Berita;
use App\Models\Voting;

class LandingController extends Controller
{
    //

    public function index()
    {

$tanggalHariIni = Carbon::now()->format('Y-m-d');
    $kemarin = Carbon::yesterday()->format('d-m-Y');
    $hariIni = Carbon::now()->format('d-m-Y');

    $pengunjung = Pengunjungweb::where('tanggal', $tanggalHariIni)->first();
    $pengunjungHariIni = Pengunjungweb::where('tanggal', $hariIni)->first();

    if ($pengunjung) {
        $pengunjung->pengunjung += 1;
        $pengunjung->save();
    } else {
        Pengunjungweb::create([
            'tanggal' => $tanggalHariIni,
            'pengunjung' => 1
        ]);
    }
  $pengunjungKemarin = Pengunjungweb::where('tanggal', $kemarin)->first();

    // Hitung total semua pengunjung
    $totalSemua = Pengunjungweb::sum('pengunjung');


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
 $berita = DB::table('berita')
            ->join('pegawai', 'berita.author', '=', 'pegawai.id')
            ->select('berita.*', 'pegawai.nama as author_name')
            ->orderBy('berita.tgl_publish', 'desc')
            ->get();

            $alamat = DB::table('kontak')
            ->where('nama', 'Alamat')
            ->value('keterangan');

            $email = DB::table('kontak')
            ->where('nama', 'Email')
            ->value('keterangan');

            $ig = DB::table('kontak')
            ->where('nama', 'Instagram')
            ->value('keterangan');

            $fb = DB::table('kontak')
            ->where('nama', 'Facebook')
            ->value('keterangan');

            $tiktok = DB::table('kontak')
            ->where('nama', 'TikTok')
            ->value('keterangan');
$total = Voting::count();
        $puas = Voting::where('pilihan', 'puas')->count();
        $cukup = Voting::where('pilihan', 'cukup')->count();
        $tidak_puas = Voting::where('pilihan', 'tidak_puas')->count();
        return view('landing',compact('total','puas','cukup','tidak_puas','tiktok','fb','ig','email','alamat','berita','slider','misi','visi','moto','jumlah_dokter','jumlah_kesehatan','jumlah_penunjang','jumlah_adm'));
    }

    public function sejarah()
    {
        $data_sejarah=DB::table('sejarahs')->get();
        return view('landing.sejarah',compact('data_sejarah'));
    }

    public function visi()
    {
        $data_visi=DB::table('visis')->get();
        $data_misi=DB::table('misis')->get();
        $data_moto=DB::table('motos')->get();
        return view('landing.visi',compact('data_visi', 'data_misi', 'data_moto'));
    }

    public function struktur()
    {
        $data_struktur=DB::table('organisasis')->get();
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
                                            $cek_id= Crypt::decrypt($id);

        $berita = DB::table('berita')
            ->join('pegawai', 'berita.author', '=', 'pegawai.id')
            ->select('berita.*', 'pegawai.nama as author_name')
            ->where('berita.id', $cek_id)
            ->first();

        if (!$berita) {
            abort(404);
        }
          DB::table('berita')
    ->where('id', $cek_id)
    ->update(['dilihat' => $berita->dilihat + 1]);
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
            $tenagamedis = DB::table('dokter')
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
            $data = DB::table('inovasi')->select('id', 'judul', 'tahun');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '<a href="'.route('landing.inovasi.show', $row->id).'" 
                                class="px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded-lg shadow text-sm">
                                Info
                            </a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('landing.inovasi');
    }

    public function showInovasi($id)
    {
        $inovasi = DB::table('inovasi')->where('id', $id)->first();
        return view('landing.inovasi_show', compact('inovasi'));
    }

    public function pengaduan()
    {
        return view('landing.pengaduan');
    }

    public function rawatinap()
    {
        $rawat_inap = DB::table('rawat_inap')->get();

        foreach ($rawat_inap as $item) {
            $item->images = DB::table('detail_inap')
                ->where('inap_id', $item->id)
                ->pluck('img');
        }

        return view('landing.rawatinap', compact('rawat_inap'));
    }
}
