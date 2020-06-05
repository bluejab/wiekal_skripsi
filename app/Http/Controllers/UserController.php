<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit($id)
    {
       $user = \App\User::find($id);
       return view('user/edit',['user' =>$user]);
    }

    public function update(request $request, $id)
    {
        $user = \App\User::find($id);
        $user -> update($request->all());

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
