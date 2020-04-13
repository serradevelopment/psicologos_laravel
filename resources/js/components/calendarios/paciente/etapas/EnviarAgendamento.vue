<template>
    <div class="elegant-calencar" v-if="day != null && schedule != null && user != null">
      <button class="btn btn-primary" @click="$store.commit('resetToDay')" id="reset" style="z-index:99999">Voltar</button>

      <div id="header-calendar">
        <div class="row">
          <div class="container" id="textCalendary">
            <div class="col-md-12" style="margin: auto">
              <button
                class="btn btn-outline-info"
                style="width: 90%;margin-top:50px;margin-bottom: 5px;"
              >Dia selecionado: {{day}}</button>
              <button
                class="btn btn-outline-info"
                style="width: 90%;margin-bottom: 5px;"
              >Horário selecionado: {{schedule.hour_start}} às {{schedule.hour_end}}</button>
              <button
                class="btn btn-outline-info"
                style="width: 90%"
              >Psicólogo selecionado: {{user.name}}</button>
            </div>
          </div>
        </div>
      </div>
      <table id="calendar">
        <tbody v-if="schedulingStatus == false">
          <div class="container">
            <div class="row">
              <div class="container" id="box" style="border-radius: 20px;">
                <h4>Preencha para agendar sua consulta com o especialista selecionado:</h4>
                <div class="container">
                  <div class="form-group">
                    <div class="input-group input-group-merge">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-user"></i>
                        </span>
                      </div>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Nome Completo"
                        name="name"
                        v-model="patient.name"
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-merge">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-envelope"></i>
                        </span>
                      </div>
                      <input
                        type="email"
                        class="form-control"
                        placeholder="Email"
                        name="email"
                        v-model="patient.email"
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-merge">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-phone"></i>
                        </span>
                      </div>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="WhatsApp (00) 00000-0000"
                        name="whatsapp"
                        v-model="patient.whatsapp"
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-merge">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-comment-alt"></i>
                        </span>
                      </div>
                      <textarea
                        type="text"
                        class="form-control"
                        placeholder="Fale um pouco sobre você"
                        name="obs"
                        v-model="patient.obs"
                        rows="3"
                        style="resize: none;"
                      ></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <button
                        type="submit"
                        class="btn btn-success"
                        @click="$store.commit('saveScheduling')"
                        style="border-radius:10px;"
                      >
                        Agendar
                        <span class="glyphicon glyphicon-send"></span>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </tbody>
        <tbody v-if="schedulingStatus == true">
          <div
            class="alert alert-success"
            style="width: 100%; border-bottom: 0px!important;"
          >
          <p>Agendamento realizado com sucesso!</p>
          <h4>Em breve um especialista entrará em contato pelo número informado.</h4>
          
          </div>
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


