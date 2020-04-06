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

<h1>Agendamentos</h1>

<div class="row" id="app">
	<div class="col-md-6">
		<calendario>
			<selecionar-dia slot="selecionarDia"></selecionar-dia>
			<selecionar-hora slot="selecionarHora"></selecionar-hora>
			<enviar-agendamento slot="enviarAgendamento"></enviar-agendamento>
		</calendario>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover" id="my-schedules-list">
						<thead>
							<tr>
								<th>Data</th>
								<th>Horário</th>
								<th>Status</th>
								<th data-orderable="false"></th>
							</tr>
						</thead>
						<tbody>
							@foreach($mySchedules as $my)
							<tr>
								<td>{{$my->date}}</td>
								<td>{{$my->hour_start}} às {{$my->hour_end}}</td>
								<td><span class="badge badge-primary" data-toggle="tooltip" data-placement="top" title="Data disponibilizada, mas nenhum paciente agendou.">Disponível</span></td>
								<td>
									<form action="{{route('schedules_users.destroy',['schedule'=>$my->id])}}" method="POST">
										<input type="hidden" name="_method" value="DELETE">
										<input type="hidden" name="_token" value="{{csrf_token()}}">
										<button class="btn btn-danger btn-sm confirmable" type="submit"><i class="fa fa-trash"></i></button>
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('js')
<script type="text/javascript">
	$("#my-schedules-list").DataTable();
</script>
@endsection