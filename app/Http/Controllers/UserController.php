<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AlatMusik;
use App\Genre;

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
}
