@extends('ramodnil.page')

@section('css')
{{-- Seus estilos específicos de página aqui --}}
@endsection


@section('content')

@if((!auth()->user()->crp_image_extension || !auth()->user()->e_psi_image_extension) && auth()->user()->role == 1 )
<div class="row">
	<div class="alert alert-danger">
		<div class="alert-heading">
			<h1>Atenção:</h1>
			<h3> Para segurança de todos usuários da plataforma, estamos solicitando aos
				psicólogos cadastrados o Crp Escaneado e um print do cadastro na página do conselho E-psi.</h3>
		</div>
		{{ Form::model(auth()->user(), ['id' => 'profile-form', 'url' => route('users.save-profile'), 'files' => true]) }}
		{{ Form::bsFile('crp_scan', 'CRP Escaneado',['required'=>true]) }}
		{{ Form::bsFile('e_psi', 'Print do Cadastro e-Psi',['required'=>true]) }}
		<button type="submit" class="btn btn-danger btn-flat">Enviar</button>
		{{ Form::close() }}
	</div>
</div>
@endif
<div class="row">
	<svg style="position:absolute;" class="custom-svg-style-1" viewBox="0 0 180 470" x="0px" y="0px" width="100%"
		height="100%">
		<g>
			<path id="shape_one_start" opacity="0.098" fill="#00a3d5"
				d="M 847.5703 23.7939 C 847.5703 23.7939 581.8154 -245.1675 394.2842 33.9375 C 305.4043 166.2183 345.0537 358.8125 253.5615 364.6631 C 162.0684 370.5146 129.5303 342.542 70.9883 383.9072 C 3.0254 431.9297 17.8926 499.2158 17.8926 499.2158 L 847.5703 499.2158 L 847.5703 23.7939 Z" />
			<path id="shape_one_end" opacity="0.098" fill="#00a3d5"
				d="m847.5703,24.7939c0,0 -85.7549,-346.9614 -273.2861,-67.8564c149.1201,176.2808 52.7695,313.875 -46.7227,312.7256c-99.4922,-1.1494 -59.0312,107.8789 -117.5732,149.2441c-67.9629,48.0225 -186.0957,167.3086 -207.0957,167.3086l644.6777,-86l0,-475.4219z"
				style="visibility:hidden" />

			<path id="shape_two_start" opacity="0.149" fill="#00a3d5"
				d="M 847.5703 239.9771 C 847.5703 239.9771 806.873 141.5913 733.1348 164.937 C 622.249 200.0459 648.416 318.083 566.6426 342.042 C 484.8682 365.999 247.9814 345.0283 168.6406 371.8037 C 89.3008 398.5781 85.5703 499.3408 85.5703 499.3408 L 847.5693 499.3408 L 847.5703 239.9771 Z" />
			<path id="shape_two_end" opacity="0.149" fill="#00a3d5"
				d="m907.5703,89.9771c0,0 29.3027,-9.3858 -95.4355,112.9599c-124.7382,122.3457 -254.7188,64.146 -300.4922,167.105c-45.7734,102.959 -79.6612,61.9863 -209.002,106.7617c-129.3408,44.7754 -218.0703,21.5371 -218.0703,21.5371l761.999,0l0.001,-265.3637z"
				style="visibility:hidden" />
		</g>
	</svg>
	<!-- Modal -->
	<div style="z-index:99999" class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
		aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Consulta agendada</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-6 col-sm-12 col-md-12 col-xs-12">
							<div class="card  mb-1">
								<div class="card-body p-1">
									Paciente: <span class="" id="patient_name"></span>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-sm-12 col-md-12 col-xs-12">
							<div class="card  mb-1">
								<div class="card-body p-1">
									Whatsapp: <span class="" id="patient_whatsapp"></span>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-sm-12 col-md-12 col-xs-12">
							<div class="card  mb-1">
								<div class="card-body p-1">
									Email: <span class="" id="patient_email"></span>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-sm-12 col-md-12 col-xs-12">
							<div class="card  mb-1">
								<div class="card-body p-1">
									Data: <span class="" id="date"></span>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-sm-12 col-md-12 col-xs-12">
							<div class="card  mb-1">
								<div class="card-body p-1">
									Horário: <span class="" id="hours"></span>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-sm-12 col-md-12 col-xs-12">
							<div class="card  mb-1">
								<div class="card-body p-1">
									Menor de idade: <span class="" id="patient_is_minor"></span>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-sm-12 col-md-12 col-xs-12">
							<div class="card  mb-1">
								<div class="card-body p-1">
									Área da saúde: <span class="" id="patient_is_health"></span>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-sm-12 col-md-12 col-xs-12">
							<div class="card  mb-1">
								<div class="card-body p-1">
									Área da segurança: <span class="" id="patient_is_security"></span>
								</div>
							</div>
						</div>
						<hr>
						<div class="col-12">
							<div class="card  mb-1">
								<div class="card-body p-1">
									Mensagem: <span class="" id="patient_obs"></span>
								</div>
							</div>

						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="row col-12">
						<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 mb-2">
							<a class="btn btn-success btn-block" id="call_whatsapp" target="_blank"><i
									class="fab fa-whatsapp"></i> Whatsapp</a>
						</div>
						<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 mb-2 footer-modal-schedule-finish">

						</div>
						<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 mb-2 footer-modal-schedule-ausent">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal FINALIZAR DE MENOR-->
	<div style="z-index:99999" class="modal fade" id="demenor" tabindex="-1" role="dialog"
		aria-labelledby="demenorLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="demenorLabel">Termo de autorização</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="/painel/psicologo/schedules_users/endSchedule" method="post"
					enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="sh_id" id="minor_sh_id" class="form-control">
					<input type="hidden" name="patient_id" id="minor_patient_id" class="form-control">
					<div class="modal-body">
						<h3>Anexe o termo de autorização enviado pelo paciente:</h3>
						<input type="file" name="minor_term" id="minor_term" class="form-control">
					</div>
					<div class="modal-footer" id="footer_is_minor">
					</div>
				</form>
			</div>
		</div>
	</div>

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
							<p class="card-category">Psicólogos Cadastrados</p>
							<h4 class="card-title">{{count(App\User::all())}}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-md-3">
		<div class="card card-stats card-primary card-round">
			<div class="card-body">
				<div class="row">
					<div class="col-5">
						<div class="icon-big text-center">
							<i class="fas fa-hand-holding-heart"></i>
						</div>
					</div>
					<div class="col col-stats">
						<div class="numbers">
							<p class="card-category">Acolhimentos Agendados</p>
							<h4 class="card-title">
								{{DB::table('schedules_has_users')->where('status','SCHEDULED')->count()}}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-sm-6 col-md-3">
		<div class="card card-stats card-primary card-round">
			<div class="card-body">
				<div class="row">
					<div class="col-5">
						<div class="icon-big text-center">
							<i class="fas fa-smile-beam"></i>
						</div>
					</div>
					<div class="col col-stats">
						<div class="numbers">
							<p class="card-category">Pacientes Acolhidos</p>
							<h4 class="card-title">
								{{DB::table('schedules_has_users')->where('status','FINISHED')->count()}}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-sm-6 col-md-3">
		<div class="card card-stats card-primary card-round">
			<div class="card-body">
				<div class="row">
					<div class="col-5">
						<div class="icon-big text-center">
							<i class="fas fa-frown"></i>
						</div>
					</div>
					<div class="col col-stats">
						<div class="numbers">
							<p class="card-category">Não compareceram</p>
							<h4 class="card-title">
								{{DB::table('schedules_has_users')->where('status','AUSENT')->count()}}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	@if($my_total_schedules && $my_total_schedules->consultas_realizadas >= 10)
	<div class="col-sm-12 col-md-12">
		<div class="card card-stats card-round">
			<div class="card-header">
				@if($total_schedules_all_users[0]->id == auth()->user()->id)
				<div class="row" style="margin:auto">
					<h2>Parabéns!! {{ auth()->user()->name }}, você é a(o) profissional que acolheu mais pessoas na
						plataforma!</h2>
				</div>
				@elseif($total_schedules_all_users[1]->id == auth()->user()->id)
				<div class="row" style="margin:auto">
					<h2>Parabéns!! {{ auth()->user()->name }}, você é a(o) segunda(o) profissional que acolheu mais
						pessoas na
						plataforma!</h2>
				</div>
				@elseif($total_schedules_all_users[2]->id == auth()->user()->id)
				<div class="row" style="margin:auto">
					<h2>Parabéns!! {{ auth()->user()->name }}, você é a(o) terceira(o) profissional que acolheu mais
						pessoas na
						plataforma!</h2>
				</div>
				@else
				<div class="row" style="margin:auto">
					<h2>Parabéns!! {{ auth()->user()->name }}, você está se saindo muito bem!</h2>
				</div>
				@endif
				<h4>Já são {{ $my_total_schedules->consultas_realizadas }} acolhimentos! Continue fazendo a
					diferença!</h4>

			</div>
			<div class="card-body">
				<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
				<lottie-player style="margin:auto;width: 300px; height: 200px;"
					src="https://assets9.lottiefiles.com/temporary_files/N9kJ4Q.json" loop="true"
					background="transparent" speed="1" autoplay></lottie-player>

			</div>
		</div>
	</div>
	@endif
</div>


<div class="row" id="app">
	<div class="col-md-6" style="margin-top:20px">
		<h1>Disponibilize um horário</h1>

		<calendario>
			<selecionar-dia slot="selecionarDia"></selecionar-dia>
			<selecionar-hora slot="selecionarHora"></selecionar-hora>
			<enviar-agendamento slot="enviarAgendamento"></enviar-agendamento>
		</calendario>
	</div>
	<div class="col-md-6" style="margin-top:20px">
		<h1>Consulte seus agendamentos</h1>

		<table-scheduling />
	</div>
</div>
@stop

@section('js')
<script>
	function showSh(sh_id){

		$.post(
				"/painel/psicologo/schedules_users/getScheduleUser",
				{
					_token: $('meta[name="csrf-token"]').attr("content"),
					sh_id: sh_id,
				},
				function (data, status) {
					var is_minor = (data.patient_is_minor)?"<div class='badge badge-success'>Sim</div>":"Não";
					var is_health = (data.patient_is_health)?"<div class='badge badge-success'>Sim</div>":"Não";
					var is_security = (data.patient_is_security)?"<div class='badge badge-success'>Sim</div>":"Não";
					$("#patient_name").html(data.patient_name)
					$("#date").html(data.date)
					$("#patient_whatsapp").html(data.patient_whatsapp)
					$("#patient_email").html(data.patient_email)
					$("#patient_obs").html(data.patient_obs)
					$("#patient_is_minor").html(is_minor)
					$("#patient_is_health").html(is_health)
					$("#patient_is_security").html(is_security)
					$("#hours").html(data.hour_start+' às '+data.hour_end)
					$("#call_whatsapp").attr('href',"https://api.whatsapp.com/send?phone=55"+data.patient_whatsapp+"&text=Olá "+data.patient_name+", tudo bem? Meu nome é "+data.name+", sou psicóloga na plataforma EuTeApoio e vi que você agendou uma consulta dia "+data.date+" das "+data.hour_start+" às "+data.hour_end+" comigo. Poderia me confirmar, por favor?");
					$(".footer-modal-schedule-finish").html('<a  class="btn btn-secondary btn-block" id="call_whatsapp" onclick="endSchedule('+data.id+')" target="_blank" style="color:white 	"><i class="fas fa-check"></i> Finalizado<br></a>')
					$(".footer-modal-schedule-ausent").html('<a  class="btn btn-danger btn-block" id="call_whatsapp" onclick="setAusent('+data.id+')" target="_blank" style="color:white 	"><i class="fas fa-times-circle"></i> Ausente</a>')


				}
			);
	}

	function endScheduleToNotMinor(sh_id){
		$.post(
			"/painel/psicologo/schedules_users/endSchedule",
			{
				_token: $('meta[name="csrf-token"]').attr("content"),
				sh_id: sh_id,
				minor_term: $('#patient_minor_term').get(0)
			},
			function (data, status) {
				window.location.href = '/painel/psicologo';
			}
		);
	}
	function endSchedule(sh_id){

		$.post(
				"/painel/psicologo/schedules_users/getScheduleUser",
				{
					_token: $('meta[name="csrf-token"]').attr("content"),
					sh_id: sh_id,
				},
				function (data, status) {
					var is_minor = data.patient_is_minor;
					if(is_minor && $('#minor_term').get(0).files.length === 0){//SE FOR DE MENOR
						$('#exampleModal').modal('hide');
						$('#demenor').modal('show');
						$("#footer_is_minor").html('<button class="btn btn-success" type="submit">Enviar</button>')
						$("#minor_sh_id").val(data.id)
						$("#minor_patient_id").val(data.patient_id)
					}else{//SE FOR DE MAIOR
						endScheduleToNotMinor(data.id);
					}
				}
			);

	}
	function setAusent(sh_id){
		$.post(
				"/painel/psicologo/schedules_users/setAusent",
				{
					_token: $('meta[name="csrf-token"]').attr("content"),
					sh_id: sh_id,
				},
				function (data, status) {
					window.location.href = '/painel/psicologo';
				}
			);
	}
</script>
@endsection
