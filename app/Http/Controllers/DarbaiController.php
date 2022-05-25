<?php

namespace App\Http\Controllers;

use App\Models\darbai;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Auth;
use Illuminate\Support\Facades\DB;

class DarbaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->authLygis > 0)
        {
        $user = Auth::user()->id;
        $priskirti = DB::table('darbai')->where('darbuotojo_id','=', Auth::user()->id)->where('isvykimo_data','=',null)->get();
        $pradeti = DB::table('darbai')->where('darbuotojo_id','=', Auth::user()->id)->where('isvykimo_data','!=',null)->where('baigimo_data','=',null)->get();
        $darbai = DB::table('darbai')->get();
        return view('praktika.darbai',compact('darbai','pradeti','priskirti'));
        }
        else
        {
            return view('dashboard');
        }
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->authLygis > 1)
        {
        $user_id = Auth::user()->id;
        return view('praktika.ikeltidarba',  ['user_id' => $user_id]);
        }
        else
        {
            return view('praktika.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tel' => 'required',
            'email'=> 'nullable',
            'adresas'=> 'required',
            'komentaras' => 'required'
        ]);
        darbai::create($request->all());
     
        return redirect()->route('praktika.index');//
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\darbai  $darbai
     * @return \Illuminate\Http\Response
     */
    public function show(darbai $darbai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\darbai  $darbai
     * @return \Illuminate\Http\Response
     */
    public function edit(darbai $darbai, $id)
    {
        $darbai=darbai::find($id);
        $userid=Auth::user()->id;
        return view('praktika.prisiskirtiDarba', compact('darbai'), compact('userid'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\darbai  $darbai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, darbai $darbai, $id)
    {
            $data = Carbon::now();
            if($request->isvykimo_data == "yra")
            {
                $request['isvykimo_data'] = $data;
            }
            else if($request->atvykimo_data)
            {
                $request['atvykimo_data'] = $data;
            }
            else if($request->baigimo_data)
            {
                $request['baigimo_data'] = $data;
            }

            $darbai=darbai::find($id);
            $darbai->update($request->all());

            return redirect()->route('praktika.index');
            //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\darbai  $darbai
     * @return \Illuminate\Http\Response
     */
    public function destroy(darbai $darbai)
    {
        //
    }
}
