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
            class="btn btn-sm"
            style="margin: 3px; background-color:#5cb8ff!important; color:white; font-size: 13px"

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
      // if(this.$store.state.schedules != null){
      //   var dateSchedule = new Date(this.year +'-'+this.month+'-'+this.day+'T09:00Z');
      //   var nowDate      = new Date(this.year +'-'+this.month+'-'+this.day);
      //   console.log(new Tim);
      //   console.log((Date.parse(this.mounth +'/'+this.day+'/'+this.year+' 9:00') >new Date()))
      //   return this.$store.state.schedules.filter(i => 
      //    ( new Date().getDate() == this.day && (new Date().getMonth()+1) == parseInt(this.month) ) && i.hour_start >= new Date().getHours()
      //     );
      // }
      return this.$store.state.schedules;
    }
  },
  mounted() {
    
  }
};
</script>

