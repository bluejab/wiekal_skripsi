<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\AlatMusik;
use App\Genre;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required','string','max:15'],
            'umur' => ['required','int','max:100'],
            'kota' => ['required','string','max:100'],
            'gender' => ['required','string','max:10'],
            'alatmusik' => ['required','max:100'],
            'genre' => ['required','max:100'],
            'fotoprofil' => ['sometimes','image','mimes:jpg,jpeg,bmp,svg,png','max:5000']
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if(request()->has('fotoprofil')){
            $fotoprofiluploaded = request()->file('fotoprofil');
            $fotoprofilname = time(). '.' . $fotoprofiluploaded->getClientOriginalExtension();
            $fotoprofilpath = public_path('/images/');
            $fotoprofiluploaded->move($fotoprofilpath,$fotoprofilname);
            
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'umur' => $data['umur'],
                'kota' => $data['kota'],
                'phone' => $data['phone'],
                'gender' => $data['gender'],
                'alatmusik' => $data['alatmusik'],
                'genre' => $data['genre'],
                'fotoprofil' => '/images/'.$fotoprofilname,
            ]);
        }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'umur' => $data['umur'],
            'kota' => $data['kota'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'alatmusik' => $data['alatmusik'],
            'genre' => $data['genre'],
        
            
        ]);
    }

    public function showRegistrationForm()
    {  $genreMusik = Genre::all();
        $alatMusik = AlatMusik::all();
        return view("auth.register", compact("alatMusik","genreMusik"));
       
    }


   
}
