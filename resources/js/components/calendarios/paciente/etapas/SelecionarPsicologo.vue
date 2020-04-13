<template>
    <div class="elegant-calencar" v-if="day != null && schedule != null && user == null">
      <button class="btn btn-primary" @click="$store.commit('resetToDay')" id="reset">Voltar</button>
      <div id="header-calendar">
        <div class="row">
          <div class="col-md-12" style="margin: auto">
            <button
              class="btn btn-outline-info"
              style="width: 90%;margin-bottom: 15px;"
            >Dia selecionado: {{day}}</button>
            <button
              class="btn btn-outline-info"
              style="width: 90%"
            >Horário selecionado: {{schedule.hour_start}} às {{schedule.hour_end}}</button>
          </div>
        </div>
      </div>
      <table id="calendar" style="max-height: 400px!important;overflow: auto!important;">
        <tbody v-if="users.length != 0">
          <div
            class="container"
            :key="i"
            v-for="(u,i) in users" 
            style="border-radius: 10px;box-shadow: 1px 1px 10px 2px; margin-top: 5px;margin-bottom: 10px;"
          >
            <div class="row" v-if="i < 4">
              <div class="col-md-4 col-4" style="margin: auto">
                <img v-if="u.avatar_extension != null"
                  style="vertical-align: middle;
							border-style: none;
							width: 60px;
							height: 60px;
							box-shadow: 1px 1px 5px 1px;
							border-radius: 50%;"
                  :src="'/files/users/'+u.id+'.'+u.avatar_extension"
                />
               <img v-if="u.avatar_extension == null" style="vertical-align: middle;
							border-style: none;
							width: 60px;
							height: 60px;
							box-shadow: 1px 1px 5px 1px;
							border-radius: 50%;"
                  src="/img/psicologo.jpeg"
                /> 
              </div>
              <div class="col-md-8 col-8">
                <h5 style="margin-bottom:0px!important">{{u.name}}</h5>
                <span>
                  <span class="text-muted">CRP: {{u.crp}}</span>
                  <br />
                </span>
                <button class="btn btn-info mb-10" @click="$store.commit('setUser',u)">Escolher</button>
              </div>
            </div>
          </div>
        </tbody>

        <tbody v-else>
          <div
            class="alert alert-danger"
            style="margin-bottom:0px!important"
          >Nenhum Psicólogo disponível para o horário selecionado</div>
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

