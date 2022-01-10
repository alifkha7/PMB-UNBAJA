<?php

namespace App\Http\Controllers;

use App\Models\Bayar;
use App\Models\Pmb;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $bayar['bayar'] = Bayar::whereStatus("MENUNGGU")->count();
        $selesai['selesai'] = Bayar::whereStatus("SELESAI")->count();
        $pmb['pmb'] = Pmb::all()->count();
        $userr['userr'] = User::where("role", "user")->count();
        return view('admin.dashboard', compact('user'))->with($bayar)->with($selesai)->with($pmb)->with($userr);
    }
}