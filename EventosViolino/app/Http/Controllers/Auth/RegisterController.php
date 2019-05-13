<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
            'nome'  => ['required', 'string', 'max:75'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:usuario'],
            'password' => ['required', 'string', 'min:8', 'max:50', 'confirmed'],
            'cpf'   => ['required', 'string', 'min:14', 'max:14', 'unique:usuario'],
        ],[
            'nome.required'     =>'Nome é obrigatório.',
            'nome.string'       =>'Nome deve ser um texto.',
            'nome.max'          =>'Nome só pode conter até 75 caracteres.',

            'email.required'    =>'Email é obrigatório.',
            'email.string'      =>'Email deve ser um texto.',
            'email.email'       =>'Email deve ser um email válido.',
            'email.max'         =>'Email pode conter só até 255 caracteres.',
            'email.unique'      =>'Email já está sendo utilizado.',

            'password.required'    =>'Senha é obrigatório.',
            'password.string'      =>'Senha deve ser um texto.',
            'password.min'         =>'Senha deve ter pelo menos 8 caracteres.',
            'password.max'         =>'Senha só pode conter até 50 caracteres.',
            'password.confirmed'   =>'Senha deve bater com a outra digitada.',

            'cpf.required'      =>'CPF é obrigatório.',
            'cpf.string'        =>'CPF deve ser um texto.',
            'cpf.min'           =>'CPF deve ter pelo menos 14 caracteres.',
            'cpf.max'           =>'CPF pode conter só até 14 caracteres.',
            'cpf.unique'        =>'CPF já cadastrado.'
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
        return User::create([
            'nome' => $data['nome'],
            'email' => $data['email'],
            'senha' => Hash::make($data['password']),
            'cpf'   => $data['cpf'],
            'nome_arquivo'=>"N/A",
            'is_admin'=>0,
            'is_ativa'=>1,
        ]);
    }
}
