<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Band;
use App\AlatMusik;
use App\Genre;
use App\CariAnggota;
use App\Acara;

class BandController extends Controller
{
    public function index()
    {
    	$band = Band::all();
        return view('band.databand', ['databand' => $band]);
    }

    public function daftar()
    {
        $genreMusik = Genre::all();
        $alatMusik = AlatMusik::all();
       return view('band.daftar', ['genreMusik' => $genreMusik,'alatMusik' => $alatMusik]);
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
            Band::create([
            'nama_band' => $request->nama_band,
            'user_id'=> auth()->user()->id,
            'kota' => $request->kota,
            'skill_member' => $request->skill_member,
            'genre' => $request->genre,
            'logo' => '/images/'.$logoname,
            'deskripsi' => $request->deskripsi
            ]);   
            return redirect(route('band.saya'));
        }   
        
        return Band::create([
            'nama_band' => $request->nama_band,
            'user_id'=> auth()->user()->id,
            'kota' => $request->kota,
            'skill_member' => $request->skill_member,
            'genre' => $request->genre,
            'deskripsi' => $request->deskripsi

    	]);
        redirect(route('band.saya'));
        
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

    public function simpanacara(Request $request)
    {

        $this->validate($request,[
 
            'jenis_acara' => 'required',      
            'lokasi' => 'required', 
            'tanggal' => 'required', 
            'waktu_mulai' => 'required', 
            'waktu_selesai' => 'required',  
        ]);

      
        Acara::create([
            $tanggalasli = $request->tanggal,
            $tanggalkonversi = date("Y-m-d", strtotime($tanggalasli)),
      
            'jenis_acara' => $request->jenis_acara,
            'lokasi' => $request->lokasi,
            'tanggal' => $tanggalkonversi,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,

    	]);
        return redirect(route('band.buatacara'));
    }

    public function lihatacara()
    {
        $acara= Acara::all();
        return view('band.lihatacara',['daftaracara' => $acara]);
    }

    public function anggota()
    {
        $user = auth()->user();
        return $user->band;
    }

    public function editband()
    {
        $band = Band::all();
        $genreMusik = Genre::all();
        $alatMusik = AlatMusik::all();
        return view('band.editband',['genreMusik' => $genreMusik,'alatMusik' => $alatMusik]);
    }

    public function update(request $request, $id)
    {
        $band = Band::all();
        $band->update($request->all());

        if(request()->has('fotoprofil')){
            $file = $request->file('fotoprofil');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/user/', $filename);
            $user->fotoprofil = '/uploads/user/'.$filename;
        }

        $band->save();
        
        return redirect('/home')-> with ('sukses', 'Data berhasil diupdate');
    }

    public function seleksianggota()
    {
       return view('band.seleksianggota');
    }

    
    
    public function carianggota()
    {
        $alatMusik = AlatMusik::all();
        $cari_anggota = CariAnggota::all();
       return view('band.carianggota', ['alatMusik' => $alatMusik],['cari' => $cari_anggota]);
    
    }
    public function posting(Request $request)
    {
        $alatMusik = AlatMusik::all();
        $this->validate($request,[
 
            'keahlian_anggota' => 'required',       
        ]);

        $request->merge([ 
            'keahlian_anggota' => implode(',', (array) $request->get('keahlian_anggota'))
        ]);
      
        CariAnggota::create([
      
            'keahlian_anggota' => $request->keahlian_anggota,

    	]);
        return redirect(route('band.carianggota'));
    }

    public function tentang()
    {
        $band = Band::all();
     return view('band.tentang');
    }
    
}
