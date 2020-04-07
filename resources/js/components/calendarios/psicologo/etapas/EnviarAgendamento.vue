<template>
  <transition name="fade">
    <div class="elegant-calencar" v-if="day != null && schedule != null">
      <button
        class="btn btn-primary"
        @click="$store.commit('resetToDay')"
        id="reset"
        style="z-index:9999"
      >Voltar</button>
      <div id="header-calendar">
        <div class="row">
          <div class="col-md-12" style="margin: auto">
            <button
              class="btn btn-outline-info"
              style="width: 90%;margin-top:50px;margin-bottom: 5px;"
            >Data selecionada: {{day}}/{{month}}/{{year}}</button>
            <button
              class="btn btn-outline-info"
              style="width: 90%;margin-bottom: 5px;"
            >Horário selecionado: {{schedule.hour_start}} às {{schedule.hour_end}}</button>
          </div>

          <div class="col-md-12">
            <button
              class="btn btn-success btn-sm"
              @click="confirmDisponibility()"
              v-if="schedulingStatus == false"
            >Confirmar</button>
          </div>
        </div>
      </div>
      <transition name="fade">
        <table id="calendar" v-if="schedulingStatus == true">
          <tbody>
            <div
              class="alert alert-success"
              style="width: 100%; margin-bottom: 0px!important; border-radius:0px 0px 20px 20px;"
            >
              <h3>Horário agendado com sucesso!</h3>
            </div>
          </tbody>
        </table>
      </transition>
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
    },
    schedulingStatus: function() {
      return this.$store.state.schedulingStatus;
    },
    patient: function() {
      return this.$store.state.patient;
    }
  },
  methods: {
    confirmDisponibility: function() {
      this.$store.state.schedulingStatus = true;
      this.$store.commit("confirmDisponibility");
      $("#table-scheduling")
        .DataTable()
        .ajax.reload();
    }
  },
  mounted() {
    //
  }
};
</script>


