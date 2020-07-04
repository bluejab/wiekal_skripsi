<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Band;
use App\LamaranAnggota;
use App\User;
use App\Notifications\ApplyBaru;
use App\AnggotaBand;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [];
        $user= auth()->user();
        $idBand=LamaranAnggota::where('user_id',$user->id)->pluck('band_id');
        $band= $user->band;
        $anggotaband = AnggotaBand::where('user_id',$user->id)->pluck('band_id');
        
        if($band !== NULL){           
            $data['userBand'] = $band;           
        }
        
        if(count($anggotaband) > 0 ){
            $data['userBand'] = $anggotaband;
        }

       $idAlatmusikuser = $user->alatMusik->id;
        
        $dataBand = Band::whereNotIn('id',$idBand)->with(['cariAnggota' => function ($q) use($idAlatmusikuser){
         return $q->where('alatmusik_id',$idAlatmusikuser);
      }])->get();

       $data['databand'] = $dataBand;

       if($band !== NULL){
        $dataa['ketua'] = TRUE;
        $dataa['userBand'] = $band;
    }

        return view('layouts.utama',$data);
    }

    public function apply($id)
    { 
        $bandi = Band::find($id);
        $bandii = $bandi->user;
        $user = Auth()->user()->id;

        LamaranAnggota::create([
            
      
            'user_id' => request()->user()->id,
            'band_id' => $bandi->id,    

        ]);
 
        $bandii->notify (new ApplyBaru (User::findOrFail($user)));

        return redirect(route('home'));   

    }

    public function MarkAsRead()
    {   
        
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }

}

