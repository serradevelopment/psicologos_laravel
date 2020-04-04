<template>
	<div class="elegant-calencar" v-if="day != null && schedule == null">
            <button class="btn btn-primary" @click="resetToDay()" id="reset">Voltar</button>
            <div id="header-calendar">
                <h3 style="margin: auto; color: white;">Dia selecionado: {{day}}</h3>

            </div>
            <table id="calendar">
                <tbody>
                    <button v-for="s in schedules" :key="s.id"  @click="setSchedule(s)" class="btn btn-secondary" style="margin: 10px">{{s.hour_start}} | {{s.hour_end}}</button>
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
            }
		},
		mounted() {
			//
		}
	}
</script>

