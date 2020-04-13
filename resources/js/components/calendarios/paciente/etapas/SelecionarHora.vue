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
            class="btn"
            style="margin: 10px; background-color:#5cb8ff!important; color:white"
          >{{s.hour_start}} | {{s.hour_end}}</button>
        </tbody>

        <tbody v-if="schedules == null || schedules.length == 0">
          <div class="alert alert-info">Nenhum especialista disponível para a data selecionada.</div>
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
    }
  },
  mounted() {
  }
};
</script>

