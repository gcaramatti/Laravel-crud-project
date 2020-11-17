<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'CPF'=> ['required', 'string', 'max:15', 'users']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    protected function create(Request $request, User $user)
    {
        $buscaPorCpf = User::where('CPF', $request->CPF)->get();
        if(count($buscaPorCpf) > 0){
            Alert::error('Erro', "Esse CPF já foi cadastrado.");
            return redirect()->back();
        }
        $buscaEmail = User::where('email', $request->email)->get();
        if(count($buscaEmail) > 0){
            Alert::error('Erro', "Esse E-mail já foi cadastrado");
            return redirect()->back();
        }

        $this->validator($request->all());
        User::create([
        'name'     => $request->name,
        'CPF'      => $request->CPF,
        'email'    => $request->email,
        'password' => bcrypt($request->password)]);
        Alert::success('Usuário cadastrado', 'Dados salvos com sucesso');
        return view("auth.login");
    }
}
