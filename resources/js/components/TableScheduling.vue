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
        dataSrc: "data",
      },
      columns: [
        { data: "hour_start" },
        { data: "hour_end" },
        { data: "date" },
        // STATUS
        {
          mRender: function(data, type, row) {
            if (row.status == 'SCHEDULED') {
              console.log(row)
                return '<button class="btn btn-secondary btn-sm" onclick="showSh('+row.id+')" data-id="'+row.id+'" data-toggle="modal"  data-target="#exampleModal">Agendado</button>';
            } else if(row.status == 'FINISHED') {
              return '<div class="badge badge-success">Finalizado</div>';
            } else if(row.status == null){
              return '<div class="badge badge-info">Disponível</div>';
            }
          },
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
