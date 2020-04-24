<template>
  <div
    class="elegant-calencar"
    v-if="day != null && schedule == null  && users.length == 0 && user == null"
  >
    <button class="btn btn-primary" @click="$store.commit('resetToDay')" id="reset">Voltar</button>
    <div id="header-calendar">
      <button class="btn btn-outline-info">Dia selecionado: {{day}}</button>
    </div>
    <table id="calendar">
      <tbody v-if="schedules != null">
        <button
          v-for="s in schedules"
          :key="s.id"
          @click="$store.commit('setSchedule',s)"
          class="btn btn-sm"
          style="margin: 3px; background-color:#5cb8ff!important; color:white"
        >{{s.hour_start}} | {{s.hour_end}}</button>
      </tbody>

      <tbody v-if="(schedules == null || schedules.length == 0) && isLoading == false">
        <div
          class="alert alert-info"
          style="width: 100%; margin-bottom: 0px!important;border-radius: 20px!important;"
        >Nenhum especialista disponível para a data selecionada.</div>
      </tbody>

      <tbody v-if="isLoading == true">
        <div
          class="alert alert-warning"
          style="width: 100%; margin-bottom: 0px!important;border-radius: 20px!important;"
        >Carregando horários...</div>
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
      var date = new Date();
      var hour = date.getHours();
      var day  = date.getDate();
      var month = date.getMonth()+1;
      var schedules = this.$store.state.schedules;
      if (schedules != null && (this.day == day && parseInt(this.$store.state.month) == parseInt(month))) {
        var schedulesAble = schedules.filter(s => {
          var hourNumber = s.hour_start.split(":");
          var hourNumber = parseInt(hourNumber[0]);
          return (hourNumber > hour);
        });
        return schedulesAble;
      }
      return this.$store.state.schedules;
    },
    isLoading: function() {
      return this.$store.state.isLoading;
    }
  },
  mounted() {}
};
</script>

