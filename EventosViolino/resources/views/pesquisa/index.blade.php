@extends('layouts.layout_master')
@section('titulo', 'Pesquisa')
@section('links_ads', '')
@section('conteudo')
	@if(count($musicas)==0)
	<h1>Nenhuma música disponível</h1>
	@else
		@foreach($musicas as $mus)
		<div class="linha">
			<a href="">{{$mus->nome}}</a>
			Postado por: {{$mus->usuario->nome}}
		</div>
		@endforeach
	@endif
@endsection