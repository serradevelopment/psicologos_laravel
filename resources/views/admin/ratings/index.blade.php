@extends('ramodnil.page')

@section('header-title')
<div class="page-header">
    <h4 class="page-title">Avaliações</h4>
</div>
@stop

@section('header-breadcrumbs')
<li class="breadcrumb-item"><a href="/">Home</a></li>
<li class="breadcrumb-item active">Avaliações</li>
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover" id="ratings-list">
                <thead>
                    <tr>
                        <th>Importância</th>
                        <th>Experiência</th>
                        <th>Relevância</th>
                        <th>Indicaria</th>
                        <th>Profissional</th>
                        <th data-orderable="false"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ratings as $u)
                    @php
                    $class = '';

                    if ($u->locked) {
                    $class = 'text-muted';
                }
                @endphp

                <tr class="{{ $class }}">
                    <td>{{ $u->importance }}</td>
                    <td>{{ App\Rating::experiences()[$u->experience] }}</td>
                    <td>{{ App\Rating::relevances()[$u->relevance] }}</td>
                    <td>{{ App\Rating::indicates()[$u->indicate] }}</td>
                    <td>{{ App\User::find($u->user_id)->name }}</td>
                    <td>
                        <div class="table-actions">

                            @if (!$u->locked)
                            @can('block', $u)
                            @if ($u->id != Auth::user()->id)
                            <a href="{{ route('ratings.block', ['rating' => $u]) }}" class="btn btn-default btn-sm confirmable"><i class="fa fa-lock"></i> Bloquear</a>
                            @endif
                            @endcan
                            @else
                            @can('unblock', $u)
                            @if ($u->id != Auth::user()->id)
                            <a href="{{ route('ratings.unblock', ['rating' => $u]) }}" class="btn btn-default btn-sm confirmable"><i class="fa fa-lock-open"></i> Desbloquear</a>
                            @endif
                            @endcan
                            @endif

                            @can('destroy', $u)
                            @if ($u->id != Auth::user()->id)
                            <form method="POST" action="{{ route('ratings.destroy', ['rating' => $u]) }}">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger btn-sm confirmable"><i class="fa fa-trash"></i></button>
                            </form>
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
@stop

@section('js')
<script>
    $('#ratings-list').DataTable();
</script>
@stop
