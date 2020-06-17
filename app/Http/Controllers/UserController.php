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


    public function index($id)
    {
        $data=Ruanganku::find($id);
        return view('user.view',compact('data')); 
    }


    public function create()
    {
        $data=Ruanganku::all();
        return view('user.ruanganku',compact('data'));
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

}
