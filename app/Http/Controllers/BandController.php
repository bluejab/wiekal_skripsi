<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Band;
use App\AlatMusik;
use App\Genre;
use App\CariAnggota;
use App\Acara;
use App\LamaranAnggota;
use App\AnggotaBand;
use App\Mail\TerimaAnggota;
use App\Mail\TolakAnggota;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Auth;

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
            'genre' => 'required',
            'logo' => 'sometimes',
            'deskripsi' => 'required',          
        ]);
        
        // $request->merge([ 
        //     'skill_member' => implode(',', (array) $request->get('skill_member'))
        // ]);
        
        if(request()->has('logo')){
            $logouploaded = request()->file('logo');
            $logoname = time(). '.' . $logouploaded->getClientOriginalExtension();
            $logopath = public_path('/images/');
            $logouploaded->move($logopath,$logoname);
            $band = Band::create([
            'nama_band' => $request->nama_band,
            'user_id'=> auth()->user()->id,
            'kota' => $request->kota,
            'genre' => $request->genre,
            'logo' => '/images/'.$logoname,
            'deskripsi' => $request->deskripsi
            ]);   
        }else{
            $band = Band::create([
                'nama_band' => $request->nama_band,
                'user_id'=> auth()->user()->id,
                'kota' => $request->kota,
                'genre' => $request->genre,
                'deskripsi' => $request->deskripsi
            ]);
        } 

        AnggotaBand::create([
            'user_id' => auth()->user()->id,
            'band_id' => auth()->user()->band->id,
            'alatmusik_id' => auth()->user()->alatmusik,

    	]);

        return redirect(route('band.carianggota'));
    }

    public function bandsaya()
    {
        $band = Band::all();
        return view('band.bandsaya', ['band' => $band]);
    }
    
    public function buatacara()
    {   
        $data = [];
        $user = auth()->user();
        $band= $user->band;

         if($band !== NULL){
            $data['ketua'] = TRUE;
            $data['userBand'] = $band;
        }

       return view('band.buatacara',$data);
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
            $tanggalkonversi = Carbon::createFromFormat('d/m/Y', $request->tanggal)->format('Y-m-d'),   
            'band_id' => auth()->user()->AnggotaBandId->band_id,
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
        
        $user = auth()->user()->AnggotaBandId->band_id;
        $acara = Acara::where('band_id',$user)->get();
        $data = [];
        $userr = auth()->user();
        $band= $userr->band;

        // foreach ($acara as $acaraa){
        // $newDT = date('Y-m-d H:i:s', strtotime("$acara->tanggal $acara->waktu_mulai"));
        //  }
        // $mytime = date('Y-m-d H:i', strtotime(Carbon::now()));
        // return $acara;
 
        // $cihuy = Acara::where($acara[0], '>', Carbon::now())->get();
        
        //  return $cihay;

        // Acara::where('tanggal', 'waktu_selesai','<', Carbon::now())->get();
          

         if($band !== NULL){
            $data['ketua'] = TRUE;
            $data['userBand'] = $band;
        }

        return view('band.lihatacara',$data,['daftaracara' => $acara]);
    }

    public function anggota()
    {
        $data = [];
        $user = auth()->user();
        $band= $user->band;

         if($band !== NULL){
            $data['ketua'] = TRUE;
            $data['userBand'] = $band;
        }

        $user = auth()->user()->AnggotaBandId->band_id;
        $anggota = AnggotaBand::where('band_id',$user)->get();

      //  return view('band.anggota');

       // $anggotaband = AnggotaBand::where('user_id',$user->id)->first();

        
       // if($anggotaband !== NULL ){
        //    $data['userBand'] = $anggotaband->getBandId;
       // }
        return view('band.anggota',$data,['dataanggota' => $anggota]);
    }

    public function editband()
    {
        $band = Band::all();
        $genreMusik = Genre::all();
        $alatMusik = AlatMusik::all();
        $user = auth()->user();
        return view('band.editband',['genreMusik' => $genreMusik,'alatMusik' => $alatMusik, 'user' => $user]);
    }

    public function update(request $request, $id)
    {
        $band = Band::find($id);
        
        $band->update($request->except('skill_member'));

        if(request()->has('logo')){
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/band/', $filename);
            $band->logo = '/uploads/band/'.$filename;
        }

        $band->save();
        
        return redirect(route('band.tentang'))-> with ('sukses', 'Data berhasil diupdate');
    }

    public function seleksianggota()
    {   
        $user = auth()->user()->band->id;
        $calon = LamaranAnggota::where('band_id',$user)->get();
       return view('band.seleksianggota', ['calon' => $calon]);
    }

    public function tolak($id)
    {   
        $anggota = LamaranAnggota::find($id);
        
        Mail::to($anggota->getUserId->email)->send(new TolakAnggota());

        $idCalon = LamaranAnggota::find($id)->delete();
        return redirect()->back();
    }

    public function terima($id)
    {   
        $anggota = LamaranAnggota::find($id);
  
        $bandId = auth()->user()->band->id;
         
        AnggotaBand::create([           
            'user_id' => $anggota->user_id,
            'band_id' => $bandId,   
            'alatmusik_id' => $anggota->getUserId->alatmusik,   
            
        ]);
        //$tolol = AnggotaBand::find($id); 
        $cekSlotLamaran = AnggotaBand::where('alatmusik_id',$anggota->getUserId->alatmusik)->pluck('alatmusik_id');
        $hapusSlotLamaran = CariAnggota::where('alatmusik_id',$cekSlotLamaran)->delete();
        //return $goblok;
        
        
        Mail::to($anggota->getUserId->email)->send(new TerimaAnggota());
        
        $idCalon = LamaranAnggota::find($id)->delete();
        return redirect()->back();

    }
    
    
    public function carianggota()
    {
        
        $alatMusik = AlatMusik::all();
        $bandId = auth()->user()->band->id;
        $cari_anggota = CariAnggota::where('band_id',$bandId)->pluck('alatmusik_id');
        return view('band.carianggota', ['alatMusik' => $alatMusik],['cari' => $cari_anggota]);
    
    }
    public function posting(Request $request)
    {
        $bandId = auth()->user()->band->id;
        $this->validate($request,[
 
            'keahlian_anggota' => 'required',       
        ]);

        foreach($request->keahlian_anggota as $skill){
            $cariAnggota = new CariAnggota;

            $cariAnggota->band_id = $bandId;

            $cariAnggota->alatmusik_id = $skill;
    
            $cariAnggota->save(); 
        }
        return redirect(route('band.carianggota'));
    }

    public function tentang()
    {
        $data = [];
        $user= auth()->user();
        $band= $user->band;
        $anggotaband = AnggotaBand::where('user_id',$user->id)->first();

        if($band !== NULL){
            $data['ketua'] = TRUE;
            $data['userBand'] = $band;
            
        }
        if($anggotaband !== NULL ){
            $data['userBand'] = $anggotaband->getBandId;
        }
        return view('band.tentang',$data);
    }

    public function keluar()
    {
        $user= auth()->user();
        $keluar = AnggotaBand::where('user_id',$user->id)->delete();
        return redirect(route('home'));
    }
  
    
}
