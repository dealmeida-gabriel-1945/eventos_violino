@extends('layouts.layout_master')
@section('titulo', 'Cadastrar Uma Música')
@section('links_ads', '')
@section('conteudo')
	<div class="linha">
		<h2 class="title title-center">Cadastro de Música</h2>
	</div>
	<div class="linha">
		<form action="{{ route('musica.store')}}" method="POST">
		{!! csrf_field() !!}
			<div class="col-l col-8 pula-1">
				<div class="div-form">
	                <label for="nome">Nome*:</label>
	            	<input type="text" id="nome" name="nome" class="input-txt input-100" placeholder="O nome da sua música aqui" required autofocus>
				</div>
				<div class="div-form">
	                <label for="observacao">Observação:</label>
	            	<textarea id="observacao" name="observacao" class="input-txt txt-area input-100" rows="10"></textarea>
				</div>
				<div class="div-form">
					<button type="submit" class="btn btn-green">Cadastrar</button>
					<a href="{{route('musica.index')}}" class="btn btn-red">Cancelar</a>
				</div>
			</div>
		</form>
		<div class="clear"></div>
	</div>
@endsection