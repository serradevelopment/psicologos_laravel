<template>
  <div class>


    <table
      id="table-scheduling"
      class="display table table-striped table-bordered"
      style="width:100%;"
    >
      <thead>
        <tr>
          <th>De</th>
          <th>Às</th>
          <th>Data</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
  computed: {
    data: function() {
      return this.$store.state.psico.dataTableScheduling.data;
    }
  },
  methods: {
    meupiru: function() {
      console.log("no seu cu");
    }
  },
  mounted() {
    $("#table-scheduling").DataTable({
      ajax: {
        url: "/painel/psicologo/mySchedules",
        method: "GET",
        dataSrc: "data"
      },
      columns: [
        { data: "hour_start" },
        { data: "hour_end" },
        { data: "date" },
        // STATUS
        {
          mRender: function(data, type, row) {
            if (row.status == true) {
                return '<button class="btn btn-success" onclick="showSh('+row.id+')" data-id="'+row.id+'" data-toggle="modal"  data-target="#exampleModal"><div class="badge badge-success">Agendado</div></button>';
            } else {
              return '<div class="badge badge-info">Disponível</div>';
            }
          }
        }

        // /* EDIT */ {
        //   mRender: function(data, type, row) {
        //     return '<a class="table-edit" data-id="' + row.id + '">EDIT</a>';
        //   }
        // }
      ]
    });
  },
  created() {}
};
</script>
