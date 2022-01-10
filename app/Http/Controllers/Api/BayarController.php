<?php

namespace App\Http\Controllers\Api;

use App\Models\Bayar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BayarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        ]);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }

        $kode_bayar = "PMB/BYR/".now()->format('Ymd').rand(100,999);
        $total_bayar = 350000;
        $kode_unik = rand(100,999);
        $total_transfer = $total_bayar + $kode_unik;
        $status = "MENUNGGU";

        $dataPembayaran = array_merge($request->all(), [
            'kode_bayar' => $kode_bayar,
            'total_bayar' => $total_bayar,
            'kode_unik' => $kode_unik,
            'total_transfer' => $total_transfer,
            'status' => $status
        ]);

        \DB::beginTransaction();
        $pembayaran = Bayar::create($dataPembayaran);

        if (!empty($pembayaran)) {
            \DB::commit();
            return response()->json([
                'success' => 1,
                'message' => 'Pembayaran berhasil',
                'pembayaran' => $pembayaran
            ]);
        } else {
            \DB::rollback();
            $this->error('Pembayaran gagal');
        }
    }

    public function error($pesan)
    {
        return response()->json([
            'success' => 0,
            'message' => $pesan
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
        $bayar = Bayar::with(['user'])->whereHas('user', function ($query) use ($id) {
            $query->whereId($id);
        })->orderBy("id", "desc")->first();
        
        if (!empty($bayar)) {
            return response()->json([
                'success' => 1,
                'message' => 'Get pembayaran berhasil',
                'pembayaran' => $bayar
            ]);
        } else {
            return $this->error('Get pembayaran gagal');
        }
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
