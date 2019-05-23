@extends('layouts.layout_master')
@section('titulo', 'Editando Meu Perfil')
@section('links_ads', '')
@section('conteudo')
	<div class="linha">
		<div class="col-10">
			<h2 class="title title-center">Editando Meu Perfil</h2>
		</div>
	</div>
	<div class="linha">
		<div class="col-l pula-3 col-4">
			<form action="{{ route('user.update',Auth::user()->id) }}" method="post">
				{!! csrf_field() !!}
				{{ method_field('PUT')}}
				<div class="div-form">
	                <label for="password">Nome:</label>
	            	<input type="text" id="nome" name="nome" class="input-txt input-100" value="{{Auth::user()->nome}}" requiredautofocus>
				</div>
				<div class="div-form">
	                <label for="password">Email:</label>
	            	<input type="text" id="email" name="email" class="input-txt input-100" value="{{Auth::user()->email}}" >
				</div>
				<div class="div-form">
	                <label for="password">Senha:</label>
	            	<input type="password" id="senha" name="senha" class="input-txt input-100" value="" style="display: none;" >
	            	<input type="password" id="senha" name="senha" class="input-txt input-100" value="" >
				</div>
	            <hr>
	            @if($errors->any())
	                <p class="msg-erro">{{$errors->first()}}</p>
	            @endif
				<div class="div-form">
					<button type="submit" class="btn btn-green">Salvar</button>
					<a href="{{route('user.show', Auth::user()->id)}}" class="btn btn-red">Cancelar</a>
				</div>
			</form>
		</div>
		<div class="clear"></div>
	</div>
@endsection