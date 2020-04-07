<template>
  <transition name="fade">
    <div class="elegant-calencar" v-if="day != null && schedule == null">
      <button class="btn btn-primary" @click="$store.commit('resetToDay')" id="reset">Voltar</button>
      <div id="header-calendar">
        <button class="btn btn-outline-info">Data selecionada: {{day}}/{{month}}/{{year}}</button>
      </div>
      <table id="calendar">
        <tbody>
          <button
            v-for="s in schedules"
            :key="s.id"
            @click="$store.commit('setSchedule',s)"
            class="btn btn-secondary"
            style="margin: 10px"
          >{{s.hour_start}} | {{s.hour_end}}</button>
        </tbody>
      </table>
    </div>
  </transition>
</template>

<script>
export default {
  computed: {
    day: function() {
      return this.$store.state.day;
    },
    month: function() {
      return this.$store.state.month;
    },
    year: function() {
      return this.$store.state.year;
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
    //
  }
};
</script>

