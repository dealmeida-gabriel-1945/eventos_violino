@extends('layouts.layout_master')
@section('titulo', 'Login')
@section('links_ads', '')
@section('conteudo')

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <h2 align="center">Login</h2>
        <div class="linha">
            <div class="col-4 pula-3">
                <label for="email">Endereço Email:</label>
                <div class="">
                    <input id="email" type="email" class="input-txt input-100" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
            </div>
        </div>
        <div class="linha">
            <div class="col-4 pula-3">
                <label for="password">Senha:</label>
                <div class="">
                    <input id="password" type="password" class="input-txt input-100" name="password" required autocomplete="current-password">
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
                <button type="submit" class="btn">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Esqueceu sua senha?
                    </a>
                @endif
                Não é cadastrado? <u><a href="{{route('register')}}">Cadastre-se aqui!</a></u>
            </div>
        </div>
    </form>

@endsection
