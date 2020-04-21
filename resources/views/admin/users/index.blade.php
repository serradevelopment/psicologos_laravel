@extends('ramodnil.page')

@section('header-title')
<div class="page-header">
    <h4 class="page-title">Usuários</h4>
</div>
@stop

@section('header-breadcrumbs')
<li class="breadcrumb-item"><a href="/">Home</a></li>
<li class="breadcrumb-item active">Usuários</li>
@endsection

@section('content')
<div class="my-2">
    @can('create', \App\User::class)
    <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Novo Usuário</a>
    @endcan
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover" id="users-list">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Perfil</th>
                        <th>Status</th>
                        <th>CRP | E-Psi</th>
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
                    <td><span class="badge badge-{{ ($u->locked == 1)?'danger':'success' }}">{{ ($u->locked == 1)?'Bloqueado':'Desbloqueado' }}</span></td>
                    <td><span class="badge badge-{{ ($u->crp_image_extension || $u->e_psi_image_extension)?'success':'danger' }}">{{ ($u->crp_image_extension || $u->e_psi_image_extension)?'Enviado':'Não Enviado' }}</span></td>
                    <td>
                        <div class="table-actions">
                            @can('edit', $u)
                            <a href="{{ route('users.show', ['user' => $u]) }}" class="btn btn-default btn-sm"><i class="fas fa-info"></i></a>
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
@stop

@section('js')
<script>
    $('#users-list').DataTable();
</script>
@stop
