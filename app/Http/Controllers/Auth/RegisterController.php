<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\provincia;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'surname' => 'required|string|max:255',
            'mes' => 'required|string|max:255',
            'ano' => 'required|string|max:255',
            'dia' => 'required|string|max:255',
            'sex' => 'required|string|max:255',
            'info' => 'required|int|max:1',
            'file' => 'required|image',

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

         $path = $data['file']->store("public");
         $nombre = basename($path);


        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'surname' => $data['surname'],
            'born_date' => $data['ano'].'-'.$data['mes'].'-'.$data['dia'],
            'sex' => $data['sex'],
            'info' => $data['info'],
            'avatar' => $nombre,
            'is_admin'=> 0,

        ]);
    }


}