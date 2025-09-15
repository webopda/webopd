<?php

namespace App\Http\Controllers;

use App\Models\RawatInap;
use App\Models\DetailInap;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;


class DetailInapController extends Controller
{
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'inap_id' => 'required|exists:rawat_inap,id',
            'img.*'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()->all()
            ]);
        }

        if ($request->hasFile('img')) {
            foreach ($request->file('img') as $file) {
                $fileName = time().'_'.uniqid().'_'.$file->getClientOriginalName();
                $file->move(public_path('detail_inap'), $fileName);

                DetailInap::create([
                    'inap_id' => $request->inap_id,
                    'img'     => $fileName,
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Foto detail berhasil ditambahkan'
        ]);
    }

    public function destroy($id)
    {
        $detail = DetailInap::findOrFail($id);

        // hapus file fisik
        $filePath = public_path('detail_inap/' . $detail->img);
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // hapus record DB
        $detail->delete();

        return response()->json([
            'success' => true,
            'message' => 'Foto berhasil dihapus'
        ]);
    }

}
