<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\DB;

class filtruotAdminPanel extends Controller
{
    public function index()
    {
        $darbid = request::input('darbuotojo_id');
        $darbai = DB::table('darbai')->where('darbuotojo_id','=',$darbid)
        ->whereBetween(
            'baigimo_data',
            [
                date("Y-m-d H:i:s",strtotime(request::input('datastart'))),
                date("Y-m-d H:i:s",strtotime(request::input('dataend')))
                ])
        ->join('users','users.id','=','darbai.darbuotojo_id')
        ->select(
            'darbai.tel',
            'users.name',
            'users.pavarde',
            'darbai.created_at',
            'darbai.email',
            'darbai.isvykimo_data',
            'darbai.baigimo_data',
            'darbai.komentaras',
            'darbai.darbKoment')
        ->orderBy('baigimo_data','desc')->get();
        $darbuotojai = DB::table('users')->get();
        return view('praktika.ataskaitaFiltruot',compact('darbai','darbuotojai'));
    }
}
