<?php

namespace App\Http\Controllers;
use App\ServicosReal;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $servicosLista = ServicosReal::where('user_id', auth()->user()->id)->get();
        if(auth()->user()->is_admin == '1'){
            $servicosLista = ServicosReal::all();
          } else {
            $servicosLista = ServicosReal::where('user_id', auth()->user()->id)->get();
          }
        return view('home')
        ->with('servicosLista', $servicosLista);
    }
}
