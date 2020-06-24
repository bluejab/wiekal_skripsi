<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Band;
use App\LamaranAnggota;
use App\User;
use App\CariAnggota;
use App\Notifications\ApplyBaru;
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
        if($band !== NULL){
            $data['userBand'] = $band;
        }

       // $data['databand'] = Band::whereNotIn('id',$idBand)->get();
        $data['databand'] = CariAnggota::whereNotIn('band_id',$idBand)->get();

        return view('layouts.utama',$data);
    }

    public function apply($id)
    { 
       // $bandi = Band::find($id);
        //$bandii = $bandi->user;
        $bandi = CariAnggota::find($id);
        $bandii = $bandi->band->user;
        $user = Auth()->user()->id;

        LamaranAnggota::create([
                 
            'user_id' => request()->user()->id,
            'band_id' => $bandi->band_id,    

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
