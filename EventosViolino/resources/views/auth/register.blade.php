@extends('layouts.layout_master')
@section('titulo', 'Login')
@section('links_ads', '')
@section('conteudo')
    <form method="POST" action="{{ route('register') }}" enctype="">
        @csrf
        <h2 align="center">Formulário de registro</h2>
        <div class="linha">
            <div class="col-4 pula-3">
                <label for="nome" class="">Nome:*</label>
                <div class="">
                    <input id="nome" type="text" class="input-txt input-100" name="nome" value="{{ old('nome') }}" placeholder="Seu nome aqui" required autocomplete="name" autofocus>
                </div>
            </div>
        </div>
        <div class="linha">
            <div class="col-4 pula-3">
                <label for="email" class="">Email:*</label>
                <div>
                    <input id="email" type="email" class="input-txt input-100" name="email" value="{{ old('email') }}" placeholder="exemplo@email.com" required autocomplete="email">
                </div>
            </div>
        </div>
        <div class="linha">
            <div class="col-4 pula-3">
                <label for="password" class="">Senha:*</label>
                <div>
                    <input id="password" type="password" class="input-txt input-100" name="password" required autocomplete="new-password">
                </div>
            </div>
        </div>
        <div class="linha">
            <div class="col-4 pula-3">
                <label for="password-confirm" class="">Confirmar Senha:*</label>
                <div>
                    <input id="password-confirm" type="password" class="input-txt input-100" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
        </div>
        <div class="linha">
            <div class="col-4 pula-3">
                <hr>
            </div>
        </div>
        <div class="linha">
            <div class="col-4 pula-3">
                <label for="cpf" class="">CPF:*</label>
                <div>
                    <input id="cpf" type="text" class="input-txt input-100" name="cpf" placeholder="xxx.xxx.xxx-xx" required>
                </div>
            </div>
        </div>
        <div class="linha">
            <div class="col-4 pula-3">
                @if($errors->any())
                    <p class="msg-erro">{{$errors->first()}}</p>
                @endif
            </div>
        </div>
        <div class="linha">
            <div class="col-4 pula-3">
                <small>* Campos obrigatórios</small>
            </div>
        </div>
        <div class="linha">
            <div class="col-4 pula-3">
                <button type="submit" class="btn btn-green">
                    Registrar-se
                </button>
                <a href="{{route('login')}}" class="btn btn-red">Voltar</a>
            </div>
        </div>
    </form>
@endsection
