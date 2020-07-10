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

        $userLogin = auth()->user();
        $band= $userLogin->AnggotaBandId;
          if($band !== NULL){
              $dataa['ketua'] = TRUE;
              $dataa['userBand'] = $band;
          }
  
          $dataa['data'] = $data;
          $dataa['user'] = $user;

        return view('user.ruanganku',$dataa);
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

      $userLogin = auth()->user();
      $band= $userLogin->AnggotaBandId;
        if($band !== NULL){
            $dataa['ketua'] = TRUE;
            $dataa['userBand'] = $band;
        }

        $dataa['data'] = $data;
        $dataa['user'] = $user;

      return view ('user.cekprofile',$dataa);
    }

    public function cekprofileU($id)
    {
      $user = \App\User::find($id);
      $data=Ruanganku::where('user_id',$user->id)->get();

      $userLogin = auth()->user();
      $band= $userLogin->AnggotaBandId;
        if($band !== NULL){
            $dataa['ketua'] = TRUE;
            $dataa['userBand'] = $band;
        }

        $dataa['data'] = $data;
        $dataa['user'] = $user;

      return view ('user.cekprofileU',$dataa);
    }

}
