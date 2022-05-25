<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ataskaitaController extends Controller
{
    public function index()
    {
        $darbuotojai = DB::table('users')->get();
        $darbai = DB::table('darbai')->join('users','users.id','=','darbai.darbuotojo_id')
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
       
            return view('praktika.ataskaita',compact('darbuotojai','darbai')); 
    }
    public function show()
    {
        $request=['darbuotojo_id'=>$darbid, 'datastart' => $datastart, 'dataend'=> $dataend];
        return route('ataskaita.index',$request);
    }
}
