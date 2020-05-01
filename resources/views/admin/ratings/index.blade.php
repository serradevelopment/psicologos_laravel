@extends('ramodnil.page')

@section('content')
<div class="page-header">
    <h4 class="page-title">Avaliações</h4>
</div>

@can('edit',Auth::user())
<div class="row">
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
                        @foreach($allRatings as $u)
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
                            <td>{{ $u->user->name }}</td>
                            <td>
                                <div class="table-actions">

                                    @if (!$u->locked)
                                    @can('block', $u)
                                    @if ($u->id != Auth::user()->id)
                                    <a href="{{ route('ratings.block', ['rating' => $u]) }}"
                                        class="btn btn-default btn-sm confirmable"><i class="fa fa-lock"></i>
                                        Bloquear</a>
                                    @endif
                                    @endcan
                                    @else
                                    @can('unblock', $u)
                                    @if ($u->id != Auth::user()->id)
                                    <a href="{{ route('ratings.unblock', ['rating' => $u]) }}"
                                        class="btn btn-default btn-sm confirmable"><i class="fa fa-lock-open"></i>
                                        Desbloquear</a>
                                    @endif
                                    @endcan
                                    @endif

                                    @can('destroy', $u)
                                    @if ($u->id != Auth::user()->id)
                                    <form method="POST" action="{{ route('ratings.destroy', ['rating' => $u]) }}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger btn-sm confirmable"><i
                                                class="fa fa-trash"></i></button>
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
</div>
@endcan

<div class="row">
    @foreach($ratings as $r)
    @if(!$r->locked)
    <div class="col-md-4">
        <div class="card card-info" style="">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="card card-primary" style="">
                            <div class="card-body">
                                Expêriencia:
                                <p class="card-text">{{ App\Rating::experiences()[$r->experience] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card card-primary" style="">
                            <div class="card-body">
                                Indicaria:
                                <p class="card-text">{{ App\Rating::indicates()[$r->indicate] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card card-primary" style="">
                            <div class="card-body">
                                Relevância:
                                <p class="card-text">{{ App\Rating::relevances()[$r->relevance] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="card-text">{{ $r->importance }}</p>
                <p class="badge badge-success">Atendido por {{ $r->user->name }}</p>
                <p class="badge badge-primary">{{ date('d/m/Y H:m',strtotime($r->created_at)) }}</p>
            </div>
        </div>
    </div>
    @endif
    @endforeach
</div>
<div class="row" >
    <div class="m-auto">
    {{ $ratings->links() }}
    </div>
</div>

@stop


@section('js')
<script>
    $('#ratings-list').DataTable();
</script>
@stop