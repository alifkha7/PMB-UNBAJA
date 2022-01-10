<?php

namespace App\Http\Controllers;

use App\Models\Pmb;
use Illuminate\Http\Request;

class PmbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pmb['listPmb'] = Pmb::paginate(15);
        return view('admin.pmb')->with($pmb);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $pmbs['listPmb'] = Pmb::where('nama_lengkap', 'like', '%' . $search . '%')->paginate(15);
        return view('admin.pmb')->with($pmbs);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function ubah(Request $request)
    {
        $pmb = Pmb::find($request->id);
        $pmb->status_ujian = $request->status_ujian;
        $pmb->save();

        return response()->json(['success' => 'Status ujian diubah.']);
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