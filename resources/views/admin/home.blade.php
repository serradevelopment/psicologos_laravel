@extends('ramodnil.page')

@section('css')
{{-- Seus estilos específicos de página aqui --}}
@endsection


@section('content')

<div class="row">

	<div class="col-sm-6 col-md-3">
		<div class="card card-stats card-primary card-round">
			<div class="card-body">
				<div class="row">
					<div class="col-5">
						<div class="icon-big text-center">
							<i class="fa fa-users"></i>
						</div>
					</div>
					<div class="col col-stats">
						<div class="numbers">
							<p class="card-category">Usuários</p>
							<h4 class="card-title">{{count(App\User::all())}}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>


<div class="row" id="app">
	<div class="col-md-6">
	<h1>Disponibilize um horário</h1>

		<calendario>
			<selecionar-dia slot="selecionarDia"></selecionar-dia>
			<selecionar-hora slot="selecionarHora"></selecionar-hora>
			<enviar-agendamento slot="enviarAgendamento"></enviar-agendamento>
		</calendario>
	</div>
	<div class="col-md-6">
	<h1>Consulte seus agendamentos</h1>

		<table-scheduling />
	</div>
</div>
@stop

@section('js')
@endsection