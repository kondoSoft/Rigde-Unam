<?php

namespace App\Http\Controllers\Auth;

use App\User;
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
    protected $redirectTo = '/usuarios/index';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

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
            'email' => 'required_if:tipoUsuario,1|string|email|max:255|unique:users|nullable',
            'password' => 'required|string|min:6|confirmed',
            'tipoUsuario' => 'required',
            'plan' => 'required_if:tipoUsuario,2',
            'nombre' => 'required_if:tipoUsuario,1',
            'apellidoPaterno' => 'required_if:tipoUsuario,1',
            'apellidoMaterno' => 'required_if:tipoUsuario,1'
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
        if ($data['tipoUsuario'] == 1) {
            $data['username'] = $data['email'];
        } else if($data['tipoUsuario'] == 2) {
            $isiPlan = explode('-', $data['plan']);
            $data['username'] = $isiPlan[0].'-'.$isiPlan[1];
        }
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'nombre' => $data['nombre'],
            'apellidoPaterno' => $data['apellidoPaterno'],
            'apellidoMaterno' => $data['apellidoMaterno'],
            'estatus' => 1,
            'index' => 'indexPrueba',
            'token' => 'token d eprueba',
            'tipoUsuario' => $data['tipoUsuario']
        ]);
    }
}
