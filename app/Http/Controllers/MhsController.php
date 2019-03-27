<?php

namespace App\Http\Controllers;

use DB;
use App\mhs;
use App\dosen;
use Illuminate\Http\Request;

class MhsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mhs = DB::table('mhs')->join('dosens','mhs.nipdosenwali','=','dosens.nip')->paginate(2);

        // $mhs = mhs::all();

        // $mhs = mhs::with(['dosens' => function($qry){
        //     $qry->select('nip','namadosen');
        // }])->get();

        // $mhs = DB::select(DB::raw('SELECT * FROM mhs join dosens on nip=nipdosenwali'));

        return view ('mhs.index',compact('mhs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dsn = dosen::pluck('namadosen','nip');

        return view ('mhs.create',compact('dsn'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        mhs::create($request->all());

        return redirect('/mhs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\mhs  $mhs
     * @return \Illuminate\Http\Response
     */
    public function show(mhs $mhs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\mhs  $mhs
     * @return \Illuminate\Http\Response
     */
    public function edit($mhs)
    {
        $mhsnya = mhs::findorfail($mhs);
        $dosennya = dosen::pluck('namadosen','nip');

        return view('mhs.edit',compact('mhsnya','dosennya'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\mhs  $mhs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $mhs)
    {
        $mhsnya = mhs::findorfail($mhs);
        $mhsnya->update($request->all());

        return redirect('/mhs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mhs  $mhs
     * @return \Illuminate\Http\Response
     */
    public function destroy($mhs)
    {
        $mhsnya = mhs::findorfail($mhs);
        $mhsnya->delete();

        // mhs::where('nrp',$mhs)->delete();
        return redirect('/mhs');
    }
}
