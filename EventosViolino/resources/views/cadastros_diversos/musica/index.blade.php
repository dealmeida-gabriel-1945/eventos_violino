@extends('layouts.layout_master')
@section('titulo', 'Minhas Músicas')
@section('links_ads')
@endsection
@section('conteudo')
	<div class="linha">
		<h2 class="title title-center">Minhas Músicas</h2>
	</div>
	<div class="linha">
		@if(count($musicas)<=0)
			<h4 class="title title-center">Você não possui nenhuma música cadastrada</h4>
			<h5 class="title title-center">Cadastre uma!! :D</h5>
		@else
			<table class=" tbl tbl-100 tbl-center">
				<thead>
					<th>Nome</th>
					<th>Observação</th>
					<th>Opções</th>
				</thead>
				<tbody>
					@foreach($musicas as $mus)
					<tr class="tbl-linha">
						<td>{{$mus->nome}}</td>
						<td>{{$mus->Observacao}}</td>
						<td>
							<a href="#" class="btn btn-blue">Ver Versões</a>
							<a href="#" class="btn btn-yellow">Editar</a>
							<a href="#" class="btn btn-red">Excluir</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		@endif
	</div>
	{{$musicas->links()}}
	<hr>
	<div class="linha">
		<div class="col-l col-6">
			<a href="{{route('musica.create')}}" class="btn btn-green">Cadastrar uma música</a>
			<a href="{{route('inicio')}}" class="btn btn-red">Cancelar</a>
		</div>
		<div class="clear"></div>
	</div>
@endsection