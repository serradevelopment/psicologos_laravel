<template>
	<div class="elegant-calencar" v-if="day != null && schedule != null && user != null">
		<button class="btn btn-primary" @click="$store.commit('resetToDay')" id="reset">Voltar</button>

		<div id="header-calendar">
			<div class="row">
				<div class="col-md-12" style="margin: auto">
					<h3 style=" color: white;">Dia selecionado: {{day}}</h3>
					<h3 style=" color: white;">Horário selecionado: {{schedule.hour_start}} às {{schedule.hour_end}}</h3>
					<h3 style=" color: white;">Psicólogo selecionado: {{user.name}}</h3>
				</div>
			</div>
		</div>

		<table id="calendar">
			<tbody v-if="schedulingStatus == false">
				<div class="container">
					<div class="row">
						<div class="form-group">
							<label for="name">Nome</label>
							<input type="text" class="form-control" name="name" v-model="patient.name">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" class="form-control" name="email" v-model="patient.email">
						</div>
						<div class="form-group">
							<label for="whatsapp">Whatsapp para atendimento</label>
							<input type="text" class="form-control tel-ddd-mask" name="whatsapp" v-model="patient.whatsapp">
						</div>
						<div class="form-group">
							<label for="whatsapp">Observação: </label>
							<input type="text" class="form-control" name="obs" v-model="patient.obs">
						</div>
						<button class="btn btn-success" @click="saveScheduling()">Agendar</button>
					</div>
				</div>

			</tbody>

			<tbody v-if="schedulingStatus == true">
				<div class="container">
					<div class="row">
						Agendamento realizado com sucesso!
					</div>
				</div>

			</tbody>

		</table>
	</div>
</template>

<script>
	export default {
		computed:{
			day: function(){
				return this.$store.state.day;
			},
			schedule: function(){
				return this.$store.state.schedule;
			},
			user: function(){
				return this.$store.state.user;
			},
			users: function(){
				return this.$store.state.users;
			},
			schedules: function(){
				return this.$store.state.schedules;
			},
			schedulingStatus: function(){
				return this.$store.state.schedulingStatus;
			},
			patient: function(){
				return this.$store.state.patient;
			}

		},
		mounted() {
			//
		}
	}
</script>

