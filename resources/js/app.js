/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
 import Vuex from 'vuex'

 require('./bootstrap');

 window.Vue = require('vue');
 const axios = require('axios').default;
 Vue.use(Vuex)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// CALENDARIO DO PACIENTE
Vue.component('calendario-paciente', require('./components/calendarios/paciente/Calendario.vue').default);
Vue.component('c-selecionar-dia', require('./components/calendarios/paciente/etapas/SelecionarDia.vue').default);
Vue.component('c-selecionar-hora', require('./components/calendarios/paciente/etapas/SelecionarHora.vue').default);
Vue.component('calendario-psicologo-selecionar-dia', require('./components/calendarios/psicologo/SelecionarDia.vue').default);


const store = new Vuex.Store({
	state:{
		day: null,
		month: null,
		year:null,
		schedule: null,
		users: [],
		schedules: null,
		user: null,
		patient:{
			name:'',
			whatsapp:'',
			email:'',
			obs:'',
		},
		schedulingStatus: false
	},
	mutations:{
		getSchedules(){
			var vuex = this.state;
			var date = vuex.day+'/'+vuex.month+'/'+vuex.year;

			axios.get("/admin/schedules/all")
			.then(function (response) {
				vuex.schedules = response.data;
			})
			.catch(function (error) {
				console.log(error);
			});
		},
		setSchedule(s){
			var vuex = this.state;
			vuex.schedule = s;
			console.log(s)
			var date = vuex.day+'/'+vuex.month+'/'+vuex.year;
			axios.post("/admin/schedules_users/all_in_date_selected", {
				_token: $('meta[name="csrf-token"]').attr('content'),
				date: date,
				schedule: s
			})
			.then(function (response) {
				console.log(response);
				vuex.users = response.data;
			})
			.catch(function (error) {
				console.log(error);
			});
		},
	}
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 const app = new Vue({
 	el: '#app',
 	store
 });
