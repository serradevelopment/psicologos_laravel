<template >
    <div class="">
        <!-- CALENDÁRIO -->
        <slot name="selecionarDia"></slot>

        <slot name="selecionarHora" ></slot>

        <slot name="selecionarPsicologo"></slot>

        <slot name="enviarAgendamento"></slot>
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
            
            resetToSchedule(){
                var vuex = this.$store.state;
                vuex.schedule = null;
                vuex.users = [];

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

    /* FORMULARIO */

    #textCalendar {
    margin:auto;
    }

    #box{
    border: 1px solid rgb(200, 200, 200);
    box-shadow: rgba(0, 0, 0, 0.1) 0px 5px 5px 2px;
    background: rgba(200, 200, 200, 0.1);
    border-radius: 4px;
    top:50px;
    width: 100%;
    }

    
    /* CALENDARIO */
    
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
