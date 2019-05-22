@extends('layouts.layout_master')
@section('titulo', 'Meu Perfil')
@section('links_ads', '')
@section('conteudo')
	<div class="linha">
		<div class="col-10">
			<h2 class="title title-center">Meu Perfil</h2>
		</div>
	</div>
	<div class="linha">
		<div class="col-l col-3p3">
			@if(Auth::user()->nome_arquivo!="N/A")
				<img class="img-profile" src="{{url('storage/user_pics/'.Auth::user()->nome_arquivo)}}">
			@else
				<img class="img-profile" src="{{url('storage/default_images/user_default.png')}}">
			@endif
		</div>
		<div class="col-l pula-1 col-5">
			<div class="div-form">
                <label for="password">Nome:</label>
            	<input type="text" id="nome" name="nome" class="input-txt input-100" readonly="" value="{{Auth::user()->nome}}" requiredautofocus>
			</div>
			<div class="div-form">
                <label for="password">Email:</label>
            	<input type="text" id="email" name="email" class="input-txt input-100" readonly="" value="{{Auth::user()->email}}" requiredautofocus>
			</div>
			<form action="{{ route('user.muda_foto')}}" method="POST" enctype="multipart/form-data">
				{!! csrf_field() !!}
				<div class="div-form">
                	<label for="password">Foto:</label>
                	<input type="file" id="foto" name="foto" class="input-txt input-100" requiredautofocus>
				</div>
                <button type="submit" class="btn btn-blue">Enviar</button>
            </form>
			@if(Auth::user()->nome_arquivo!="N/A")
				<form action="{{ route('user.remove_foto')}}" method="POST">
					{!! csrf_field() !!}
	                <button class="btn btn-red">Remover Foto</button>
	            </form>
            @endif
            <hr>
            @if($errors->any())
                <p class="msg-erro">{{$errors->first()}}</p>
            @endif
			<div class="div-form">
				<a href="{{ route('user.edit', Auth::user()->id) }}" class="btn btn-yellow">Editar</a>
			</div>
		</div>
		<div class="clear"></div>
	</div>
@endsection