<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pmb;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PmbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pmbs = Pmb::all();
        return response()->json([
            'success' => 1,
            'message' => 'Get pmb berhasil',
            'pmbs' => $pmbs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'user_id' => 'required',
            'nama_lengkap' => 'required',
            'nik' => 'required|unique:pmbs',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'no_hp' => 'required|unique:pmbs',
            'alamat' => 'required',
            'informasi' => 'required',
            'sekolah_asal' => 'required',
            'nama_ibu' => 'required',
            'prodi_id' => 'required',
            'kelas' => 'required',
        ]);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }

        $id = DB::table('pmbs')->max('id');
        $no_daftar = str_pad($id + 1, 5, 0, STR_PAD_LEFT);
        $tanggal_lahir = Carbon::createFromFormat('d-m-Y', $request->tanggal_lahir)->format('Y-m-d');
        $status_ujian = "BELUM AKTIF";

        $dataPMB = array_merge($request->all(), [
            'no_daftar' => $no_daftar,
            'tanggal_lahir' => $tanggal_lahir,
            'status_ujian' => $status_ujian,
        ]);

        \DB::beginTransaction();
        $pmb = Pmb::create($dataPMB);

        if ($pmb) {
            \DB::commit();
            return response()->json([
                'success' => 1,
                'message' => 'Data PMB berhasil disimpan',
                'pmb' => $pmb,
            ]);
        } else {
            \DB::rollback();
            return $this->error('Data PMB gagal disimpan');
        }
    }

    public function error($pesan)
    {
        return response()->json([
            'success' => 0,
            'message' => $pesan,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pmb = Pmb::with(['user', 'prodi'])->whereHas('user', function ($query) use ($id) {
            $query->whereId($id);
        })->orderBy("id", "desc")->first();

        if (!empty($pmb)) {
            return response()->json([
                'success' => 1,
                'message' => 'Get pmb user berhasil',
                'pmb' => $pmb,
            ]);
        } else {
            return $this->error('Get pmb user gagal');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function ujian(Request $request, $id)
    {
        $pmb = Pmb::findOrFail($id);

        $pmb->update($request->all());

        if ($pmb) {
            \DB::commit();
            return response()->json([
                'success' => 1,
                'message' => 'Status ujian berhasil diupdate',
                'pmb' => $pmb,
            ]);
        } else {
            \DB::rollback();
            return $this->error('Status ujian gagal diupdate');
        }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}