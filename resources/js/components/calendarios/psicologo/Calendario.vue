<template >
  <div style="position:relative">
    <!-- CALENDÁRIO -->

    <slot name="selecionarDia"></slot>

    <slot name="selecionarHora"></slot>

    <slot name="enviarAgendamento"></slot>
  </div>
</template>

<script>
export default {
  methods: {},
  mounted() {},
  created() {}
};
</script>


<style type="text/css">

/* EFEITOS DE TRANSICAO */
.fade-enter-active {
  animation-timing-function: ease-in;
  -webkit-animation-timing-function: ease-in;
  animation: fade-in 0.5s;
  position: absolute!important;
  margin: auto!important;
  z-index: 99999;

}
.fade-leave-active {
  animation-timing-function: ease-out;
  -webkit-animation-timing-function: ease-out;
  animation: fade-out 0.5s;
  position: absolute!important;
  margin: auto!important;
  z-index: 99999;
}

@keyframes fade-in {
  0% {
    margin-left: -600px;
  }
  100% {
    margin-left: 0px;
  }
}
@keyframes fade-out {
  0% {
    margin-left: 0px;
  }
  100% {
    margin-left: -600px;
  }
}

/* CALENDARIO */
.elegant-calencar {
  width: 25em;
  border: 1px solid #c9c9c9;
  -webkit-box-shadow: 0 0 5px #c9c9c9;
  box-shadow: 0px 0px 15px 1px rgba(0, 0, 0, 0.75);
  text-align: center;
  position: relative;
  margin: auto;
  border-radius: 20px;
  z-index: 99999;
}

#header-calendar {
  font-family: "HelveticaNeue-UltraLight", "Helvetica Neue UltraLight",
    "Helvetica Neue", Arial, Helvetica, sans-serif;
  height: 14em;
  background-color: #2a3246;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  border-radius: 20px;
}

.pre-button,
.next-button {
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

.pre-button:hover,
.next-button:hover {
  -webkit-transform: rotate(360deg);
  -ms-transform: rotate(360deg);
  transform: rotate(360deg);
}

.pre-button:active,
.next-button:active {
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
  border-radius: 20px;
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

#calendar tbody tr td {
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

#calendar tbody td:hover {
  border-radius: 50%;
  box-shadow: 0 2px 10px RGBA(255, 50, 120, 0.9);
}

#calendar tbody td:active {
  -webkit-transform: scale(0.7);
  -ms-transform: scale(0.7);
  transform: scale(0.7);
}

#today {
  background-color: #2a3246;
  color: #fff !important;
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
  border-radius: 10px;
}

ol,
ul {
  list-style: none;
}
blockquote,
q {
  quotes: none;
}
blockquote:before,
blockquote:after,
q:before,
q:after {
  content: "";
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
