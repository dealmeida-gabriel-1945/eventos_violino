<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Musica;

class PesquisaController extends Controller
{
    public function pesquisa_musica(Request $request){
    	$musicas = Musica::where('nome', 'like', '%'.$request->busca.'%')->paginate(6);
    	return view('pesquisa.index', ['musicas'=>$musicas]);
    }
}
