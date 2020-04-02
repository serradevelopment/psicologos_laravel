<template >
    <div class="">
        <!-- CALENDÁRIO -->
        <slot name="selecionarDia"></slot>

        <slot name="selecionarHora" ></slot>

        <div class="elegant-calencar" v-if="day != null && schedule != null && user == null">
            <button class="btn btn-primary" @click="resetToDay()" id="reset">Voltar</button>
            <div id="header-calendar">
                <div class="row">
                    <div class="col-md-12" style="margin: auto">
                        <h3 style=" color: white;">Dia selecionado: {{day}}</h3>
                        <h3 style=" color: white;">Horário selecionado: {{schedule.hour_start}} às {{schedule.hour_end}}</h3>

                    </div>
                </div>

            </div>
            <table id="calendar">
                <tbody v-if="users.length != 0">

                    <div class="container" v-for="u in users" style="border-radius: 10px;box-shadow: 1px 1px 10px 2px;">
                        <div class="row">
                            <div class="col-md-4">
                                <img style="vertical-align: middle;
                                border-style: none;
                                width: 60px;
                                height: 60px;
                                box-shadow: 1px 1px 5px 1px;
                                border-radius: 50%;" src="/img/demos/app-landing/product/psicologo.png">
                            </div>
                            <div class="col-md-8">
                                <h5>{{u.name}}</h5>
                                <span> <span class="text-muted">CRP: {{u.crp}}</span><br/></span>
                                <button class="btn btn-info" @click="setUser(u)">Escolher</button>
                            </div>

                        </div>
                    </div>

                </tbody>

                <tbody v-else>
                    <div class="alert alert-danger">Nenhum Psicólogo disponível para o horário selecionado</div>
                </tbody>

            </table>
        </div>

        <div class="elegant-calencar" v-if="day != null && schedule != null && user != null">
            <button class="btn btn-primary" @click="resetToDay()" id="reset">Voltar</button>

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
        methods:{
            resetToDay(){
                var vuex = this.$store.state;
                vuex.day = null;
                vuex.month = null;
                vuex.year = null;
                vuex.schedule = null;
                vuex.users = [];
                vuex.schedules = null;
                vuex.user = null;
                vuex.schedulingStatus = false;
            },
            resetToSchedule(){
                var vuex = this.$store.state;
                vuex.schedule = null;
                vuex.users = [];

            },
            setUser(user){
                var vuex = this.$store.state;
                vuex.user = user;

            },
            saveScheduling(){
                var vuex = this.$store.state;

                var date = vuex.day+'/'+vuex.month+'/'+vuex.year;
                axios.post("/admin/schedules_users/savePatient", {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    date: date,
                    schedule: vuex.schedule,
                    patient: vuex.patient
                })
                .then(function (response) {
                    if(response.status == 200){
                        vue.schedulingStatus = true;
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            
            
            confirmScheduling(){
                var vuex = this.$store.state;
                var day = vuex.day;
                var month = vuex.month;
                var year = vuex.year;
                var schedule = vuex.schedule;
                $.post("/admin/schedules",
                {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    date: day+'/'+month+'/'+year,
                    schedule: schedule
                },
                function(data, status){
                    vue.resetToDay();
                });
            }
        },
        mounted(){
            console.log('calendario montado');
        },
        created() {
            var vuex = this.$store.state;
        }
    }
</script>


<style type="text/css">
    .elegant-calencar {
        width: 25em;
        border: 1px solid #c9c9c9;
        -webkit-box-shadow: 0 0 5px #c9c9c9;
        box-shadow: 0 0 5px #c9c9c9;
        text-align: center;
        position: relative;
        margin: auto; 
    }

    #header-calendar {
        font-family: 'HelveticaNeue-UltraLight', 'Helvetica Neue UltraLight', 'Helvetica Neue', Arial, Helvetica, sans-serif;
        height: 14em;
        background-color: #2a3246;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
    }

    .pre-button, .next-button {
        margin-top: 2em;
        font-size: 3em;
        -webkit-transition: -webkit-transform 0.5s;
        transition: transform 0.5s;
        cursor: pointer;
        width: 1em;
        height: 1em;
        line-height: 1em;
        color: #e66b6b;
        border-radius: 50%;
    }

    .pre-button:hover, .next-button:hover {
        -webkit-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        transform: rotate(360deg);
    }

    .pre-button:active,.next-button:active{
        -webkit-transform: scale(0.7);
        -ms-transform: scale(0.7);
        transform: scale(0.7);
    }

    .pre-button {
        margin: auto;
    }

    .next-button {
        margin: auto;
    }


    .head-day {
        margin-top: 30px;
        font-size: 8em;
        line-height: 1;
        color: #fff;
    }

    .head-month {
        margin-top: 20px;
        font-size: 2em;
        line-height: 1;
        color: #fff;
    }

    #calendar {
        height: 100%;
        width: 100%;
        margin: 0 auto;
        background-color: white;
    }

    #calendar tr {
        height: 2em;
        line-height: 2em;
    }

    #calendar thead tr {
        color: #e66b6b;
        font-weight: 700;
        text-transform: uppercase;
    }

    #calendar tbody tr {
        color: #252a25;
    }

    #calendar tbody tr td{
        cursor: default;
        color: #2b2b2b;
        height: 10px;
        width: 26px;
        font-size: 15px;
        padding: 10px;
        line-height: 26px;
        text-align: center;
        border-radius: 50%;
        border: 2px solid transparent;
        transition: all 250ms;
    }



    #calendar tbody td:hover{
        border-radius: 50%;
        box-shadow: 0 2px 10px RGBA(255, 50, 120, .9);
    }

    #calendar tbody td:active {
        -webkit-transform: scale(0.7);
        -ms-transform: scale(0.7);
        transform: scale(0.7);
    }

    #today {
        background-color: #2A3246;
        color: #fff;
        font-family: serif;
        border-radius: 50%;
    }

    #disabled {
        cursor: default;
        background: #fff0;
    }

    #disabled:hover {
        background: #fff0;
        color: #c9c9c9;
    }

    #reset {
        display: block;
        position: absolute;
        right: 0.5em;
        top: 0.5em;
        transition: all 0.3s ease;
    }



    ol, ul {
        list-style: none;
    }
    blockquote, q {
        quotes: none;
    }
    blockquote:before, blockquote:after,
    q:before, q:after {
        content: '';
        content: none;
    }
    table {
        border-spacing: 2px;
    }
    .clearfix:before,
    .clearfix:after {
        content: " "; /* 1 */
        display: table; /* 2 */
    }

    .clearfix:after {
        clear: both;
    }
    .clearfix {
        *zoom: 1;
    }
</style>
