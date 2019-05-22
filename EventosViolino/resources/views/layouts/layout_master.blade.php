<!DOCTYPE html>
<html>
	<head>
		<title>Eventos - @yield('titulo')</title>
		<link rel="stylesheet" type="text/css" href="{{ url('/css/master_elementos.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ url('/css/master_classes.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ url('/css/tabela_posicoes.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ url('/css/botoes.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ url('/css/texts.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ url('/css/inputs.css') }}" />
		@yield('links_ads')
	</head>
	<body>
		<div class="master">
			<div class="div-header">
				<div class=" col-l col-1">
					<a href="{{ route('inicio') }}">
						<img class="logo-main" src="{{url('storage/default_images/icon.png')}}">
					</a>
				</div>
				@if(Auth::user()!=null)
					<div class="col-l col-1">
						<div class="center-y">
							<a href="#" class="btn btn-item">Meus Eventos</a>
						</div>
					</div>
					<div class="col-l col-1 pula-0p5">
						<div class="center-y">
							<a href="#" class="btn btn-item">Minhas Músicas</a>
						</div>
					</div>
				@else
					<div class="col-l col-2">
						<div class="center-y">
							<span class="span-layout">Eventos musicais</span>
						</div>
					</div>
				@endif
				<div class=" col-r col-1">
					@if(Auth::user()!=null)
						@if(Auth::user()->nome_arquivo!="N/A")
						<a href="{{route('user.show',Auth::user()->id)}}">
							<img src="{{url('storage/users_img/'.Auth::user()->nome_arquivo)}}">
						</a>
						@else
						<a href="{{route('user.show',Auth::user()->id)}}">
							<img class="img-user" src="{{url('storage/default_images/user_default.png')}}">
						</a>
						@endif
					@else
					<div class="center-y">
						<a href="#">
							<span class="span-layout">
								<a href="{{ route('login') }}">Login</a>
							</span>
						</a>
					</div>
					@endif
				</div>
				<div class=" col-r col-2">
					<div class="center-y">
						<form action="{{route('pesquisa.musica')}}" method="POST">
							{!! csrf_field() !!}
							<input type="text" name="busca" id="busca" placeholder="Pesquise alguma música..." class="input-txt">
							<button type="submit" class="btn btn-submit">Buscar</button>
						</form>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="content">
			 @yield('conteudo')
		</div>
	</body>
</html>