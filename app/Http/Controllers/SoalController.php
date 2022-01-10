<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $soal['listSoal'] = Soal::all();
        return view('admin.soal')->with($soal);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_soal');
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
            'soal' => 'required',
            'opsi_1' => 'required',
            'opsi_2' => 'required',
            'opsi_3' => 'required',
            'opsi_4' => 'required',
            'opsi_5' => 'required',
            'jawaban' => 'required'
        ]);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
        }
        
        $soal = Soal::create(array_merge($request->all(), [
        ]));
        return redirect('soal')->with('success','Soal berhasil ditambah!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function show(Soal $soal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function edit(Soal $soal)
    {
        return view('admin.edit_soal', compact('soal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Soal $soal)
    {
        $request->validate([
            'soal' => 'required',
            'opsi_1' => 'required',
            'opsi_2' => 'required',
            'opsi_3' => 'required',
            'opsi_4' => 'required',
            'opsi_5' => 'required',
            'jawaban' => 'required'
        ]);
         
        /// mengubah data berdasarkan request dan parameter yang dikirimkan
        $soal->update($request->all());
         
        /// setelah berhasil mengubah data
        return redirect()->route('soal.index')
                        ->with('success','Soal berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Soal $soal)
    {
        
    }
}
