<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Band;

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
        $band= $user->band;
        if($band !== NULL){
            $data['userBand'] = $band;
        }

        $data['databand'] = Band::all();

        return view('layouts.utama',$data);
    }

    public function apply()
    {
        return "heheh";
        $this->validate($request,[
 
            'jenis_acara' => 'required',      
    
        ]);

    }

}
