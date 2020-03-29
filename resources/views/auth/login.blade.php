@extends('ramodnil.raw')

@section('content')
<div class="login">
    <div class="wrapper wrapper-login">

        <div class="container container-login animated fadeIn">
            <div class="login-form">
                @if (\App\User::first())
                {{ Form::open(['url' => route('login')]) }}
                <h3 class="text-center">Laravel Ramodnil</h3>
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="E-mail">

                    <div class="input-group-append">
                        <span class="fa fa-envelope input-group-text"></span>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Senha">

                    <div class="input-group-append">
                        <span class="fa fa-lock input-group-text"></span>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-8">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Permanecer logado
                            </label>
                        </div>
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                    </div>
                </div>

                {{ Form::close() }}

                <p class="login-actions">
                    @if ($errors->has('email') || $errors->has('password'))
                    <div class="alert alert-danger">
                        Usuário ou senha inválidos
                    </div>
                    @endif

                    <p><a href="#">Esqueci minha senha</a></p>
                </p>
                @else
                <h6 class="text-center">Nenhum usuário encontrado. Por favor, cadastre o primeiro usuário.</h6>

                {{ Form::open(['url' => route('users.first-user'), 'id' => 'first-user-form']) }}

                {{ Form::bsText('name', 'Nome') }}

                {{ Form::bsEmail('email', 'E-mail') }}
                <div class="position-relative">
                    {{ Form::bsPassword('password', 'Senha') }}
                    <div class="show-password" style="margin-top: 10px">
                        <i class="flaticon-interface"></i>
                    </div>
                </div>

                
                <div class="position-relative">
                    {{ Form::bsPassword('confirm_password', 'Repita a Senha') }}
                    <div class="show-password" style="margin-top: 10px">
                        <i class="flaticon-interface"></i>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-flat">Salvar e Entrar</button>

                {{ Form::close() }}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $('#first-user-form').validate({
        rules: {
            'name': 'required',
            'email': {
                'required': true,
                'email': true
            },
            'password': 'required',
            'confirm_password': {
                'required': true,
                'equalTo': '#password'
            }
        },
        messages: {
            'confirm_password': {
                'equalTo': 'Deve ser igual à Senha'
            }
        }
    });
</script>
@endsection