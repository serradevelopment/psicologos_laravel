@extends('ramodnil.master')

@section('adminlte_css')
@yield('css')
<style>
 i{
     color: white
 }
</style>
@endsection

@section('body')
<div class="wrapper">
    <div class="main-header" style="background-color:#86e0ff !important">
        <!-- Logo Header -->
        <div class="logo-header">

            <img src="/img/eu-te-apoio-text.png" class="d-none d-md-block d-lg-block" width="180"/>
            <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="fa fa-bars"></i>
                </span>
            </button>

            {{-- <button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
            <div class="navbar-minimize">
                <button class="btn btn-minimize btn-rounded">
                    <i class="fa fa-bars"></i>
                </button>
            </div> --}}
        </div>
        <!-- End Logo Header -->

        <!-- Navbar Header -->
        <nav class="navbar navbar-header navbar-expand-lg ">

            <div class="container-fluid">
                <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                    {{-- @php

                    $countNotifications = count(auth()->user()->unreadNotifications);

                    @endphp
                    <li class="nav-item dropdown hidden-caret" id="markAsRead" >
                        <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            @if($countNotifications > 0)
                                <span class="notification">{{$countNotifications}}</span>
                            @endif
                        </a>
                        <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">

                            <li>
                                @if($countNotifications > 0)
                                <div class="dropdown-title">Você tem {{$countNotifications}} {{($countNotifications > 1)?'novas notificações' : 'nova notificação'}}</div>
                                @else
                                <div class="dropdown-title">Você não tem novas notificações</div>
                                @endif
                            </li>
                            @foreach(auth()->user()->unreadNotifications as $notification)
                            <li>
                                <div class="notif-scroll scrollbar-outer">
                                    <div class="notif-center">
                                        @include('layouts.partials.notification.'.snake_case(class_basename($notification->type)))
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            <li>
                                <a class="see-all" href="javascript:void(0);">Ver todas notificações<i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </li> --}}
                    <li class="nav-item dropdown hidden-caret">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                            <div class="avatar-sm">
                                {!!Auth::user()->avatar!!}
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-user animated fadeIn">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg">{!!Auth::user()->avatar!!}</div>
                                    <div class="u-text">
                                        <h4>{{Auth::user()->name}}</h4>
                                        <p class="text-muted">{{Auth::user()->email}}</p>
                                        <!-- <a href="profile.html" class="btn btn-rounded btn-danger btn-sm">Ver Perfil</a> -->
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('users.profile')}}">Meu Perfil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('logout')}}">Sair</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
        <!-- End Navbar -->
    </div>

    <!-- Sidebar -->
    <div class="sidebar">

        <div class="sidebar-background"></div>
        <div class="sidebar-wrapper scrollbar-inner">
            <div class="sidebar-content">
                <div class="user">
                    {!!Auth::user()->avatar!!}
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                            <span>
                                {{Auth::user()->name}}
                                <span class="user-level badge badge-info" style="color:white">{{((Auth::user()->role == 0)?"Administrador":(Auth::user()->role == 1))?"Psicólogo":"Estagiário"}}</span>
                                <span class="caret"></span>
                            </span>
                        </a>
                        <div class="clearfix"></div>

                        <div class="collapse in" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a href="{{route('users.profile')}}">
                                        <span class="link-collapse">Meu Perfil</span>
                                    </a>
                                </li>
                                <li>
                                <a class="link-collapse" style="color:black" href="{{route('logout')}}">Sair</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">

                    @include('ramodnil.main-menu')
                </ul>

            </div>
        </div>
    </div>
    <!-- End Sidebar -->

    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                @yield('header-title')

                <!-- Main -->
                <section class="content">
                    @if(Session::has('flash.success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                        {{ Session::get('flash.success') }}
                    </div>
                    @endif

                    @if(Session::has('flash.error'))
                    <div class="alert alert-error">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                        {{ Session::get('flash.error') }}
                    </div>
                    @endif

                </section>

                @yield('content')
            </div>
        </div>

    </div>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <!-- Título -->
                    <div class="col-sm-6">
                        @yield('header-title')
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <footer class="main-footer">
        <div class="text-right">
            <!-- Texto do Footer -->
        </div>
    </footer>
</div>
@endsection

@section('adminlte_js')
@yield('js')
@endsection
