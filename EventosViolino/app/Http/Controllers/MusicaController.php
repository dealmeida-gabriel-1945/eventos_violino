<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Musica;
use Auth;

class MusicaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musicas = Auth::user()->musicas()->paginate(5);
        return view('cadastros_diversos.musica.index', ['musicas'=>$musicas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cadastros_diversos.musica.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'nome'              => 'required|string|max:50|min:3',
            'observacao'        => 'nullable|string|max:250',
        ];
        $mensagens = [
            'nome.required'     => 'O nome é obrigatório.',
            'nome.string'       =>'O nome deve ser um texto.',
            'nome.min'          =>'O nome deve ter, no mínimo, 3 caracteres.',
            'nome.max'          =>'O nome deve ter, no máximo, 50 caracteres.',

            'observacao.string'      =>'A observacao deve ser um texto.',
            'observacao.max'          =>'A observacao deve ter, no máximo, 50 caracteres.',
        ];
        $request->validate($regras,$mensagens);

        $musica = new Musica();
        $musica->nome = $request->nome;
        $musica->observacao = $request->observacao;
        $musica->user_id = Auth::user()->id;
        $musica->save();
        return redirect()->route('musica.index', Auth::user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
