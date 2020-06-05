<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Band;

class BandController extends Controller
{
    public function index()
    {
    	$band = Band::all();
        return view('band.databand', ['databand' => $band]);
    }

    public function daftar()
    {
       return view('band.daftar');
    }

    public function store(Request $request)
    {
        
    	$this->validate($request,[
            'nama_band' => 'required',
            'kota' => 'required',
            'skill_member' => 'required',
            'genre' => 'required',
            'logo' => 'sometimes',
            'deskripsi' => 'required',          
        ]);
        
        $request->merge([ 
            'skill_member' => implode(',', (array) $request->get('skill_member'))
        ]);
        
        if(request()->has('logo')){
            $logouploaded = request()->file('logo');
            $logoname = time(). '.' . $logouploaded->getClientOriginalExtension();
            $logopath = public_path('/images/');
            $logouploaded->move($logopath,$logoname);
            return Band::create([
            'nama_band' => $request->nama_band,
            'kota' => $request->kota,
            'skill_member' => $request->skill_member,
            'genre' => $request->genre,
            'logo' => '/images/'.$logoname,
            'deskripsi' => $request->deskripsi
            ]);   
        }   
        
        return Band::create([
    		'nama_band' => $request->nama_band,
            'kota' => $request->kota,
            'skill_member' => $request->skill_member,
            'genre' => $request->genre,
            'deskripsi' => $request->deskripsi

    	]);
        return redirect('/band');
        
    }

    public function bandsaya()
    {
        $band = Band::all();
        return view('band.bandsaya', ['band' => $band]);
    }
    
    public function buatacara()
    {
       return view('band.buatacara');
    }
}
