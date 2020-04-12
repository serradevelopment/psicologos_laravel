@php
    $routeArray = app('request')->route()->getAction();
    $controllerAction = class_basename($routeArray['controller']);
    list($controller, $action) = explode('@', $controllerAction);
@endphp
<!-- Demo CSS -->
	<link rel="stylesheet" href="css/demos/demo-seo.css">

	<!-- Skin CSS -->
    <link rel="stylesheet" href="css/skins/skin-seo.css"> 
    
@extends('ramodnil.raw')

@section('content')
<div class="login" style="background-color:#e5f6fb !important">
    <div class="wrapper wrapper-login">
        <svg style="position:absolute" class="custom-svg-style-1" viewBox="0 0 180 470" x="0px" y="0px" width="100%" height="100%">
            <g>
                <path id="shape_one_start" opacity="0.098" fill="#00a3d5" d="M 847.5703 23.7939 C 847.5703 23.7939 581.8154 -245.1675 394.2842 33.9375 C 305.4043 166.2183 345.0537 358.8125 253.5615 364.6631 C 162.0684 370.5146 129.5303 342.542 70.9883 383.9072 C 3.0254 431.9297 17.8926 499.2158 17.8926 499.2158 L 847.5703 499.2158 L 847.5703 23.7939 Z" />
                <path id="shape_one_end" opacity="0.098" fill="#00a3d5" d="m847.5703,24.7939c0,0 -85.7549,-346.9614 -273.2861,-67.8564c149.1201,176.2808 52.7695,313.875 -46.7227,312.7256c-99.4922,-1.1494 -59.0312,107.8789 -117.5732,149.2441c-67.9629,48.0225 -186.0957,167.3086 -207.0957,167.3086l644.6777,-86l0,-475.4219z" style="visibility:hidden" />

                <path id="shape_two_start" opacity="0.149" fill="#00a3d5" d="M 847.5703 239.9771 C 847.5703 239.9771 806.873 141.5913 733.1348 164.937 C 622.249 200.0459 648.416 318.083 566.6426 342.042 C 484.8682 365.999 247.9814 345.0283 168.6406 371.8037 C 89.3008 398.5781 85.5703 499.3408 85.5703 499.3408 L 847.5693 499.3408 L 847.5703 239.9771 Z" /> 
                <path id="shape_two_end" opacity="0.149" fill="#00a3d5" d="m907.5703,89.9771c0,0 29.3027,-9.3858 -95.4355,112.9599c-124.7382,122.3457 -254.7188,64.146 -300.4922,167.105c-45.7734,102.959 -79.6612,61.9863 -209.002,106.7617c-129.3408,44.7754 -218.0703,21.5371 -218.0703,21.5371l761.999,0l0.001,-265.3637z" style="visibility:hidden" /> 								
            </g>
        </svg>
        <div class="container container-login animated fadeIn">
            <div class="login-form">
                @if (\App\User::first() && $controller != 'UsersController' && $action != 'registerForm')
                {{ Form::open(['url' => route('login')]) }}
                <div class="row">
                    <img src="{{ asset('/img/eu-te-apoio.png') }}" width="200" style="margin: auto">
                </div>
                <div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600">
                    <p class="text-4 mb-5 mb-md-2" data-plugin-float-element data-plugin-options="{'startPos': 'none', 'speed': 0.5, 'transition': true, 'horizontal': false}">Olá! Faça login no painel para continuar.</p>
                </div>
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
                    <p><a href="{{ route('users.cadastrar.create') }}">Não possuo cadastro.</a></p>
                </p>
                @elseif($controller == 'UsersController' && $action == 'registerForm')
                <div class="row">
                    <img src="{{ asset('/img/eu-te-apoio.png') }}" width="200" style="margin: auto">
                </div>
                {{ Form::open(['url' => route('users.cadastrar'), 'id' => 'cadastrar-form']) }}

                {{ Form::bsText('name', 'Nome') }}
                {{ Form::bsText('crp', 'CRP') }}
                {{ Form::bsText('whatsapp', 'Whatsapp',['class'=>'tel-ddd-mask']) }}
                {{ Form::bsText('specialty', 'Especialidade') }}

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

                
                @else
                <h6 class="text-center">Nenhum usuário encontrado. Por favor, cadastre o primeiro usuário.</h6>

                {{ Form::open(['url' => route('users.first-user'), 'id' => 'first-user-form']) }}

                {{ Form::bsText('name', 'Nome') }}
                {{ Form::bsText('crp', 'CRP') }}
                {{ Form::bsText('whatsapp', 'Whatsapp',['class'=>'tel-ddd-mask']) }}
                {{ Form::bsText('specialty', 'Especialidade') }}

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
            'crp': 'required',
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
    $('#cadastrar-form').validate({
        rules: {
            'name': 'required',
            'email': {
                'required': true,
                'email': true
            },
            'password': 'required',
            'crp': 'required',
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
<!-- Demo -->
<script src="js/demos/demo-seo.js"></script>
@endsection