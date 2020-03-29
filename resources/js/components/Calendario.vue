<template >
    <div>
        <!-- CALENDÁRIO -->
        <div class="elegant-calencar"  v-show="day == null" style=" margin: auto">
            <button class="btn btn-primary" id="reset">Limpar</button>
            <div id="header-calendar">

                <div class="col-md-2 pre-button">
                    <i class="fas fa-angle-left"></i>
                </div>

                <div class="col-md-8">
                    <div class="head-day"></div>
                    <div class="head-month"></div>
                </div>

                <div class="col-md-2 next-button">
                    <i class="fas fa-angle-right"></i>
                </div>
            </div>
            <table id="calendar">
                <thead>
                    <tr>
                        <th>Dom</th>
                        <th>Seg</th>
                        <th>Ter</th>
                        <th>Qua</th>
                        <th>Qui</th>
                        <th>Sex</th>
                        <th>Sáb</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="elegant-calencar" v-if="day != null">
            <button class="btn btn-primary" @click="resetDay()" id="reset">Voltar</button>
            <div id="header-calendar">
                <h3>Dia selecionado: </h3>{{day}}
                
            </div>
            <table id="calendar">
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        data:function(){
            return {
                day: null
            }
        },
        methods:{
            resetDay(){
                this.day = null;
            }
        },
        mounted(){

        },
        created() {
            var vue = this;

            document.addEventListener('DOMContentLoaded', function(){
                var today = new Date(),
                year = today.getFullYear(),
                month = today.getMonth(),
                monthTag =["Jan","Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez"],
                day = today.getDate(),
                days = document.getElementsByTagName('td'),
                selectedDay,
                setDate,
                daysLen = days.length;

                function Calendar(selector, options) {
                    this.options = options;
                    this.draw();
                }

                Calendar.prototype.draw  = function() {
                    this.getCookie('selected_day');
                    this.getOptions();
                    this.drawDays();
                    var that = this,
                    reset = document.getElementById('reset'),
                    pre = document.getElementsByClassName('pre-button'),
                    next = document.getElementsByClassName('next-button');

                    pre[0].addEventListener('click', function(){that.preMonth(); });
                    next[0].addEventListener('click', function(){that.nextMonth(); });
                    reset.addEventListener('click', function(){that.reset(); });
                    while(daysLen--) {
                        days[daysLen].addEventListener('click', function(){that.clickDay(this); });
                    }
                };

                Calendar.prototype.drawHeader = function(e) {
                    var headDay = document.getElementsByClassName('head-day'),
                    headMonth = document.getElementsByClassName('head-month');

                    e?headDay[0].innerHTML = e : headDay[0].innerHTML = day;
                    headMonth[0].innerHTML = monthTag[month] +" - " + year;        
                };

                Calendar.prototype.drawDays = function() {
                    var startDay = new Date(year, month, 1).getDay(),  
                    nDays = new Date(year, month + 1, 0).getDate(),

                    n = startDay; 
                    for(var k = 0; k <31; k++) {
                        days[k].innerHTML = '';
                        days[k].id = '';
                        days[k].className = '';
                    }

                    for(var i  = 1; i <= nDays ; i++) {
                        days[n].innerHTML = i; 
                        n++;
                    }

                    for(var j = 0; j < 31; j++) {
                        if(days[j].innerHTML === ""){

                            days[j].id = "disabled";

                        }else if(j === day + startDay - 1){
                            if((this.options && (month === setDate.getMonth()) && (year === setDate.getFullYear())) || (!this.options && (month === today.getMonth())&&(year===today.getFullYear()))){
                                this.drawHeader(day);
                                days[j].id = "today";
                            }
                        }
                        if(selectedDay){
                            if((j === selectedDay.getDate() + startDay - 1)&&(month === selectedDay.getMonth())&&(year === selectedDay.getFullYear())){
                                days[j].className = "selected";
                                this.drawHeader(selectedDay.getDate());
                            }
                        }
                    }
                };

                Calendar.prototype.clickDay = function(o) {
                    var selected = document.getElementsByClassName("selected"),
                    len = selected.length;
                    if(len !== 0){
                        selected[0].className = "";
                    }
                    o.className = "selected";
                    selectedDay = new Date(year, month, o.innerHTML);
                    this.drawHeader(o.innerHTML);
                    this.setCookie('selected_day', 1);
                    console.log(vue.day)

                    vue.day = o.innerHTML;
                    console.log(vue.day)
                };

                Calendar.prototype.preMonth = function() {
                    if(month < 1){ 
                        month = 11;
                        year = year - 1; 
                    }else{
                        month = month - 1;
                    }
                    this.drawHeader(1);
                    this.drawDays();
                };

                Calendar.prototype.nextMonth = function() {
                    if(month >= 11){
                        month = 0;
                        year =  year + 1; 
                    }else{
                        month = month + 1;
                    }
                    this.drawHeader(1);
                    this.drawDays();
                };

                Calendar.prototype.getOptions = function() {
                    if(this.options){
                        var sets = this.options.split('-');
                        setDate = new Date(sets[0], sets[1]-1, sets[2]);
                        day = setDate.getDate();
                        year = setDate.getFullYear();
                        month = setDate.getMonth();
                    }
                };

                Calendar.prototype.reset = function() {
                    month = today.getMonth();
                    year = today.getFullYear();
                    day = today.getDate();
                    this.options = undefined;
                    this.drawDays();
                };

                Calendar.prototype.setCookie = function(name, expiredays){
                    if(expiredays) {
                        var date = new Date();
                        date.setTime(date.getTime() + (expiredays*24*60*60*1000));
                        var expires = "; expires=" +date.toGMTString();
                    }else{
                        var expires = "";
                    }
                    document.cookie = name + "=" + selectedDay + expires + "; path=/";
                };

                Calendar.prototype.getCookie = function(name) {
                    if(document.cookie.length){
                        var arrCookie  = document.cookie.split(';'),
                        nameEQ = name + "=";
                        for(var i = 0, cLen = arrCookie.length; i < cLen; i++) {
                            var c = arrCookie[i];
                            while (c.charAt(0)==' ') {
                                c = c.substring(1,c.length);

                            }
                            if (c.indexOf(nameEQ) === 0) {
                                selectedDay =  new Date(c.substring(nameEQ.length, c.length));
                            }
                        }
                    }
                };
                var calendar = new Calendar();


            }, false);
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

        /*.head-info {
            float: left;
            width: 264px;
            }*/

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

            thead tr {
                color: #e66b6b;
                font-weight: 700;
                text-transform: uppercase;
            }

            tbody tr {
                color: #252a25;
            }

            tbody td{
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

            .selected {
                color: #fff;
                border-radius: 50%;
                background-color: #a52a2af2;
            }

            tbody td:hover{
                border-radius: 50%;
                box-shadow: 0 2px 10px RGBA(255, 50, 120, .9);
            }

            tbody td:active {
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

            #reset:hover {
                color: #e66b6b;
                border-color: #e66b6b;
            }

            #reset:active{
                -webkit-transform: scale(0.8);
                -ms-transform: scale(0.8);
                transform: scale(0.8);     
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
/**
 * For IE 6/7 only
 * Include this rule to trigger hasLayout and contain floats.
 */
 .clearfix {
    *zoom: 1;
}
</style>
