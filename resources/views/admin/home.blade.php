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
		<calendario :schedules="{{$schedules}}"></calendario>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover" id="users-list">
						<thead>
							<tr>
								<th>Nome</th>
								<th>E-mail</th>
								<th>Perfil</th>
								<th data-orderable="false"></th>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $u)
							@php
							$class = '';

							if ($u->locked) {
							$class = 'text-muted';
						}
						@endphp

						<tr class="{{ $class }}">
							<td>{{ $u->name }}</td>
							<td>{{ $u->email }}</td>
							<td>{{ $u->role_string }}</td>
							<td>
								<div class="table-actions">
									@can('edit', $u)
									<a href="{{ route('users.edit', ['user' => $u]) }}" class="btn btn-default btn-sm"><i class="fa fa-pencil-alt"></i> Editar</a>
									@endcan

									@if (!$u->locked)
									@can('block', $u)
									@if ($u->id != Auth::user()->id)
									<a href="{{ route('users.block', ['user' => $u]) }}" class="btn btn-default btn-sm confirmable"><i class="fa fa-lock"></i> Bloquear</a>
									@endif
									@endcan
									@else
									@can('unblock', $u)
									@if ($u->id != Auth::user()->id)
									<a href="{{ route('users.unblock', ['user' => $u]) }}" class="btn btn-default btn-sm confirmable"><i class="fa fa-lock-open"></i> Desbloquear</a>
									@endif
									@endcan
									@endif

									@can('destroy', $u)
									@if ($u->id != Auth::user()->id)
									{{ Html::deleteLink('Excluir', route('users.destroy', ['user' => $u]), ['button_class' => 'btn btn-danger btn-sm confirmable', 'icon' => 'trash']) }}
									@endif
									@endcan
								</div>
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
{{-- Seus scripts específicos de página aqui --}}
@endsection