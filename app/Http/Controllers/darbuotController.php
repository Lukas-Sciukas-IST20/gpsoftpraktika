<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class darbuotController extends Controller
{
    public function index()
    {
        if(Auth::user()->authLygis == 3)
        {
            $darbuot = DB::table('users')->where('authLygis','=','0')->get();
            $darbvisi = DB::table('users')->get();
            return view('praktika.adminpanel', compact('darbuot','darbvisi'));
        }
        else
        {
            return view('dashboard');
        }
        //
    }
    public function edit(darbai $darbai, $id)
    {
        $darbuot = DB::table('users')->where('authLygis','=','0')->get();
        return view('praktika.adminpanel', ['darbuot' => $darbuot]);
        //
    }
    public function update(Request $request, $id)
    {
            $request->validate([
                'authLygis' => 'required',
            ]);
            $affected = DB::table('users')
              ->where('id', $id)
              ->update(['authLygis' => $request->authLygis]);
            

            return redirect()->route('admin.index');
            //
    }

    public function destroy($user)
    {
        $kuris=DB::table('users')->where('id','=',$user)->delete();
        return redirect()->route('admin.index');
        //
    }
}
