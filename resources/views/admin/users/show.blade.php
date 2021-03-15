@extends('ramodnil.page')

<style>
    .crp-image {
        width: 100% !important;
        height: 100% !important;
    }

    .epsi-image {
        width: 100% !important;
        height: 100% !important;
    }
</style>

@section('content')

<div class="modal fade bd-crpimage-modal-lg" tabindex="-1" role="dialog" aria-labelledby="modal-crp-image"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="crp-image">
            asdasd
        </div>
    </div>
</div>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $user->name }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-1 col-lg-1 ">
                    {!! $user->avatar !!}
                </div>
                <div class=" col-md-9 col-lg-9 ">
                    <table class="table table-user-information">
                        <tbody>
                            @if($user->role == 1)
                            <tr>
                                <td>CRP:</td>
                                <td>{{ $user->crp }}</td>
                            </tr>
                            <tr>
                                <td>Especialidade</td>
                                <td>{{ $user->specialty }}</td>
                            </tr>
                            <tr>
                                <td>Crp Scaneado</td>
                                <td>
                                    @if($user->crp_image_extension)
                                    <button data-toggle="modal" onclick="setCrpImageModal('{{ $user->getCrpImage() }}')"
                                        data-target=".bd-crpimage-modal-lg" class="btn btn-info">
                                        <i class="fa fa-image"></i>
                                    </button>
                                    @else
                                    <span class="badge badge-danger">Não cadastrado</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>E-psi Scaneado</td>
                                <td>
                                    @if($user->e_psi_image_extension)
                                    <button data-toggle="modal"
                                        onclick="setCrpImageModal('{{ $user->getEpsiImage() }}')"
                                        data-target=".bd-crpimage-modal-lg" class="btn btn-info">
                                        <i class="fa fa-image"></i>
                                    </button>
                                    @else
                                    <span class="badge badge-danger">Não cadastrado</span>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <td>Whatsapp:</td>
                                <td>{{ $user->whatsapp }}</td>
                            </tr>
                            <tr>
                            <tr>
                                <td>Tipo de usuário</td>
                                <td>{{ $user->getRoleStringAttribute() }}</td>
                            </tr>

                            <tr>
                                <td>Email</td>
                                <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                            </tr>

                        </tbody>
                    </table>


                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                @can('edit', $user)
                    <a href="{{ route('users.edit', ['user' => $user]) }}" class="btn mx-2  btn-default btn-sm"><i
                            class="fa fa-pencil-alt"></i>
                        Editar</a>
                @endcan
                @if (!$user->locked)
                    @can('block', $user)
                        @if ($user->id != Auth::user()->id)
                            <a href="{{ route('users.block', ['user' => $user]) }}" class="btn mx-2 btn-default btn-sm confirmable"><i
                                    class="fa fa-lock"></i> Bloquear</a>
                        @endif
                    @endcan
                @else
                    @can('unblock', $user)
                        @if ($user->id != Auth::user()->id)
                            <a href="{{ route('users.unblock', ['user' => $user]) }}" class="btn mx-2 btn-default btn-sm confirmable"><i
                                    class="fa fa-lock-open"></i> Desbloquear</a>
                        @endif
                    @endcan
                @endif
                @can('destroy', $user)
                    @if ($user->id != Auth::user()->id)
                        <form style="    display: contents;" method="POST" action="{{ route('users.destroy', ['user' => $user]) }}">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger btn-sm mx-2 confirmable"><i class="fa fa-trash"></i></button>
                        </form>
                    @endif
                @endcan
            </div>

        </div>

    </div>
</div>

@stop
@section('js')
<script>
    function setCrpImageModal(image){
    console.log(image)
    $("#crp-image").html(image);
}
</script>
@endsection
