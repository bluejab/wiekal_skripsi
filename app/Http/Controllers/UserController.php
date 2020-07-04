<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AlatMusik;
use App\Genre;
use App\Ruanganku;

class UserController extends Controller
{
    public function edit()
    {
       $user = auth()->user();
       $anggotaband = $user->AnggotaBandId;
       $alatMusik = AlatMusik::all();
       $genreMusik = Genre::all();
       return view('user/edit',['user' =>$user, 'alatMusik' => $alatMusik, 'genreMusik' => $genreMusik]);
    }

    public function update(request $request, $id)
    {
        $user = auth()->user();
        $user->update($request->all());

        if(request()->has('fotoprofil')){
            $file = $request->file('fotoprofil');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/user/', $filename);
            $user->fotoprofil = '/uploads/user/'.$filename;
        }

        $user ->save();
        
        return redirect('/home')-> with ('sukses', 'Data berhasil diupdate');
    }

    public function create()
    { 
        $user = auth()->user()->id;
        $data=Ruanganku::where('user_id',$user)->get();
        return view('user.ruanganku',['data' => $data]);
    }
    
    public function store(Request $request)
    {
        $data = new Ruanganku;
        if($request->file('file')){
            $file=$request->file('file');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->file->move('storage/',$filename);

            $data->file=$filename;
        }
        $data->user_id = auth()->user()->id;
        $data->keterangan=$request->keterangan;
        $data->save();
        return redirect()->back();
    }

    public function cekprofile($id)
    {
      $user = \App\User::find($id);
      $data=Ruanganku::where('user_id',$user->id)->get();
      return view ('user.cekprofile',['user'=>$user,'data' => $data]);
    }

}
