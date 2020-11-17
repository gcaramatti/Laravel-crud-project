<?php

namespace App\Http\Controllers;

use App\User;
use Alert;
use App\Usuario;
use PDOException;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Boolean;

class UsuarioController extends Controller
{

    public function edit(User $user)
    {
        $user = auth()->user();
        return view("Usuario.edit")->with('user', $user);
    }

    public function update(Request $request, User $user)
    {
        $buscaPorCpf = User::where('CPF', $request->CPF)->get();
        if((count($buscaPorCpf) > 0) && ($request->CPF != $user->CPF)){
            Alert::error('Erro', "Esse CPF já foi cadastrado");
            return redirect()->back();
        }
        $buscaEmail = User::where('email', $request->email)->get();
        if((count($buscaEmail) > 0) && ($request->email != $user->email)){
            Alert::error('Erro', "Esse E-mail já foi cadastrado");
            return redirect()->back();
        }

        try {
            $user = auth()->user();
            $user->name = $request->name;
            $user->CPF = $request->CPF;
            $user->email = $request->email;
            if(!empty($request->password)){
                $user->password = bcrypt($request->password);
                }
            $user->save();

        } catch (PDOException $e) {
            Alert::error('Dados de usuario não atualizado', 'Erro ao atualizar dados');
        }
            Alert::success('Dados de usuario atualizados', 'Dados salvos com sucesso');
            return redirect()->back();
    }
}
