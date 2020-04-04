<template>
  <div class="elegant-calencar" v-if="day != null && schedule != null">
    <button class="btn btn-primary" @click="resetToSchedule()" id="reset">Voltar</button>
    <div id="header-calendar">
      <div class="row">
        <div class="col-md-12" style="margin: auto">
          <h3 style=" color: white;">Dia selecionado: {{day}}</h3>
          <h3
            style=" color: white;"
          >Horário selecionado: {{schedule.hour_start}} às {{schedule.hour_end}}</h3>
        </div>

        <div class="col-md-12">
          <button class="btn btn-success" @click="confirmScheduling()">Confirmar</button>
        </div>
      </div>
    </div>
    <table id="calendar">
      <tbody>
        <!-- <button v-for="s in schedules" class="btn btn-secondary" style="margin: 10px">{{s.hour_start}} | {{s.hour_end}}</button> -->
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  computed: {
    day: function() {
      return this.$store.state.day;
    },
    schedule: function() {
      return this.$store.state.schedule;
    },
    user: function() {
      return this.$store.state.user;
    },
    users: function() {
      return this.$store.state.users;
    },
    schedules: function() {
      return this.$store.state.schedules;
    },
    schedulingStatus: function() {
      return this.$store.state.schedulingStatus;
    },
    patient: function() {
      return this.$store.state.patient;
    }
  },
  mounted() {
    //
  }
};
</script>


