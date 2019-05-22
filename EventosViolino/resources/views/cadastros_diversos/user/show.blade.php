@extends('layouts.layout_master')
@section('titulo', 'Login')
@section('links_ads', '')
@section('conteudo')
	<div class="linha">
		<div class="col-l col-3p3">
			@if(Auth::user()->nome_arquivo!="N/A")
				<img class="img-profile" src="{{url('storage/users_img/'.Auth::user()->nome_arquivo)}}">
			@else
				<img class="img-profile" src="{{url('storage/default_images/user_default.png')}}">
			@endif
			<form>
				<div class="div-form">
                	<input type="file" id="foto" name="foto" class="input-txt input-100" requiredautofocus>
				</div>
                <button type="submit" class="btn btn-blue">Enviar</button>
                <a href="{{route('user.remove_foto')}}" class="btn btn-red">Remover Foto</a>
            </form>
		</div>
		<div class="clear"></div>
	</div>
@endsection