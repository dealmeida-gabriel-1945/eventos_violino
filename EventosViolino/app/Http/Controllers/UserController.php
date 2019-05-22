<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Storage;

class UserController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()->id == $id){
            return view('cadastros_diversos.user.show');
        }else{
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->id!=$id){
            return redirect()->back();
        }else{
            return view('cadastros_diversos.user.edit');
        }
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
        if(Auth::user()->id!=$id){
            return redirect()->back();
        }
        $regras = [
            'nome'              => 'required|string|max:75|min:3',
            'email'             => 'required|email|max:255|unique:usuario,email,'.Auth::user()->id.',id',
            'senha'             => 'nullable|min:6|max:255',
        ];
        $mensagens = [
            'nome.required'     => 'O nome é obrigatório.',
            'nome.string'       =>'O nome deve ser um texto.',
            'nome.min'          =>'O nome deve ter, no mínimo, 3 caracteres.',
            'nome.max'          =>'O nome deve ter, no máximo, 75 caracteres.',

            'email.required'    => 'O email é obrigatória.',
            'email.string'      =>'O email deve ser um email válido.',
            'email.unique'      =>'O email dá está sendo usado.',
            'email.max'         =>'O email deve ter, no máximo, 255 caracteres.',


            'senha.min' => 'A senha deve ter, no mínimo, 6 caracteres.',
            'senha.max'=>'A senha deve ter, no máximo, 255 caracteres.',
        ];
        $request->validate($regras,$mensagens);

        $user = User::find($id);
        $user->nome = $request->nome;
        $user->email = $request->email;
        if($request->senha!=null){
            $user->senha = $request->senha;
        }
        $user->update();
        return redirect()->route('user.show', Auth::user()->id);
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



    public function mudaFoto(Request $request)
    {
        $regras = [
            'foto'              => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ];
        $mensagens = [
            'foto.required'     => 'A foto é obrigatória',
            'foto.image'        =>'A foto deve ser uma imagem (jpeg,png,jpg)',
            'foto.mimes'        =>'A foto deve ser uma imagem (jpeg,png,jpg)',
            'foto.max'          =>'A foto excedeu o tamanho máximo aceitável'
        ];
        $request->validate($regras,$mensagens);

        if(Auth::user()->nome_arquivo!='N/A')
        {
            Storage::delete('public/user_pics/'.Auth::user()->nome_arquivo);
        }
        //tratamento dos dados da imagem
        $imageName = date("Y_m_d-H_i_s-").kebab_case(Auth::user()->nome).'.'.$request->foto->getClientOriginalExtension();
        $upload = $request->foto->storeAs('public/user_pics', $imageName);
        if ( !$upload ){
            return redirect()
                        ->back()
                        ->with('error', 'Falha ao fazer upload')
                        ->withInput();
        }
        $user = User::find(Auth::user()->id);
        $user->nome_arquivo = $imageName;
        $user->update();
        return redirect()->route('user.show', Auth::user()->id);
    }

    public function removeFoto(Request $request)
    {
        if(Auth::user()->nome_arquivo=='N/A'){
            return redirect()
                        ->back()
                        ->with('error', 'Não é possível remover sua foto de perfil pois ela é a padrão.');
        }else{
            Storage::delete('public/user_pics/'.Auth::user()->nome_arquivo);

            $user = User::find(Auth::user()->id);
            $user->nome_arquivo = 'N/A';
            $user->update();
            return redirect()->route('user.show', Auth::user()->id);
        }
    }
}
