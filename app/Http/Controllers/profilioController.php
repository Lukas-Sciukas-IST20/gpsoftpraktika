<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class profilioController extends Controller
{
    public function index()
    {
        return view('praktika.profilis', ['darbuot' => Auth::user()]);
        //
    }

    public function update()
    {
        $affected = DB::table('users')
              ->where('id', Auth::user()->id)
              ->update(['authLygis' => 0]);
              return redirect()->route('profilis.index');
        //
    }
}
