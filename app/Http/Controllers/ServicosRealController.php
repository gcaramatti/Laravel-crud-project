<?php

namespace App\Http\Controllers;

use App\ServicosReal;
use Illuminate\Http\Request;
use App\User;
use Alert;
use mysqli;
use PDOException;
//use RealRashid\SweetAlert\Facades\Alert as Alert;

class ServicosRealController extends Controller
{

    public function create()
    {
        //tela de criação de um novo registro
        return view("Servico.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(User::validaDonoTarefa() == false) return abort(404);

        $procurarServiço = ServicosReal::where("id", $request->id)->count();
        try {
            ServicosReal::create($request->all());
        } catch (PDOException $e) {
            session()->flash("alert-error", "Erro ao criar serviço");
            dd($e->getMessage());
        }

        $servicosLista = ServicosReal::where('user_id', auth()->user()->id)->get();
        if(auth()->user()->is_admin == '1'){
            $servicosLista = ServicosReal::all();
          } else {
            $servicosLista = ServicosReal::where('user_id', auth()->user()->id)->get();
          }

        Alert::success('Serviço criado', 'Dados salvos com sucesso');
        return view('home')
            ->with('servicosLista', $servicosLista);
    }

    public function edit(ServicosReal $servicosReal, $id)
    {

        if(User::validaDonoTarefa() == false) return abort(404);

        $servicosReal = ServicosReal::find($id);

        return view("Servico.edit")->with('servicosLista', $servicosReal);
    }

    public function update(Request $request, ServicosReal $servicosReal, $id)
    {
        if(User::validaDonoTarefa() == false) return abort(404);

        $servicosReal = ServicosReal::find($id);

        if(empty($servicosReal)){
            Alert::error('Serviço não encontrado.', 'Erro ao atualizar dados');
            return redirect()->back();
        }

        try {
            $servicosReal->update($request->all());
        } catch (PDOException $e) {
            Alert::error('Serviço não atualizado', 'Erro ao atualizar dados');
        }

        $servicosLista = ServicosReal::where('user_id', auth()->user()->id)->get();
        if(auth()->user()->is_admin == '1'){
            $servicosLista = ServicosReal::all();
          } else {
            $servicosLista = ServicosReal::where('user_id', auth()->user()->id)->get();
          }

        Alert::success('Serviço atualizado', 'Dados salvos com sucesso');
        return view("home")
        ->with("servicosLista", $servicosLista);
    }

    public function destroy($id)
    {
        if(User::validaDonoTarefa() == false) return abort(404);

        $servicoReal = ServicosReal::find($id);
        try {
            if(!empty($servicoReal))
            $servicoReal->delete();
        } catch (PDOException $e) {
            session()->flash("alert-error", "Houve um erro ao tentar excluir a pessoa");
        }
        return view("home")
            ->with("servicosLista", ServicosReal::all());
    }
    public function servicosAtribuidos(){
        $servicosLista = ServicosReal::where('user_id','!=', auth()->user()->id)->where('created_by', auth()->user()->id)->get();
        return view('ServicosAtribuidos')
        ->with('servicosLista', $servicosLista);
    }
}
