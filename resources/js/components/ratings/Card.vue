<template>
  <div class="row">
    <div class="col-md-4" v-for="r in ratingsUnlockeds" :key="r.id">
      <div class="card card-info" style>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="card card-primary" style>
                <div class="card-body">
                  Expêriencia:
                  <p class="card-text">{{ r.experience }}</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="card card-primary" style>
                <div class="card-body">
                  Indicaria:
                  <p class="card-text">{{ r.indicate }}</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-10 col-md-10 col-10">
              <div class="card card-primary" style>
                <div class="card-body">
                  Relevância:
                  <p class="card-text">{{ r.relevance }}</p>
                </div>
              </div>
            </div>
            <div class="col-2">
                {{ r.votes }}
              <button v-if="user.id == r.votes.user" :class="'btn btn-primary rating-'+r.id" @click="vote(r.id)">
                <i class="caret" style="transform: rotate(180deg)"></i>
              </button>
            </div>
          </div>
          <p class="card-text">{{ r.importance }}</p>
          <p class="badge badge-success">Atendido por {{ r.user.name }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["ratings","user"],
  computed: {
    ratingsUnlockeds: function() {
      return this.ratings.filter(s => {
        return s.locked == 0;
      });
    }
  },
  methods: {
    vote(rating_id) {

        $('.rating-'+rating_id).html('<i class="fa fa-circle-notch fa-spin"></i>');
        $('.rating-'+rating_id).attr("disabled", "disabled");
      axios
        .post("/painel/ratings/vote", {
          _token: $('meta[name="csrf-token"]').attr("content"),
          rating_id: rating_id
        })
        .then(function(response) {
          console.log(response)
        })
        .catch(function(error) {
          console.log(error);
        })
        .finally(function() {
           $('.rating-'+rating_id).html('a');
        });
    }
  },
  mounted() {
    console.log("Component mounted.");
    console.log(this.ratings)
  }
};
</script>
