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
          <th></th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>
</template>
<script src="http://cdn.datatables.net/plug-ins/1.10.20/sorting/date-eu.js"></script>
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
  methods: {},
  mounted() {
    jQuery.extend(jQuery.fn.dataTableExt.oSort, {
      "date-br-pre": function(a) {
        if (a == null || a == "") {
          return 0;
        }
        var brDatea = a.split("/");
        return (brDatea[2] + brDatea[1] + brDatea[0]) * 1;
      },

      "date-br-asc": function(a, b) {
        return a < b ? -1 : a > b ? 1 : 0;
      },

      "date-br-desc": function(a, b) {
        return a < b ? 1 : a > b ? -1 : 0;
      }
    });

    $("#table-scheduling").DataTable({
      ajax: {
        url: "/painel/psicologo/mySchedules",
        method: "GET",
        dataSrc: "data"
      },
      order: [
        [2, "asc"],
        [1, "asc"]
      ],
      columnDefs: [
        {
          type: "date-br",
          targets: 2
        },
        { type: "time", targets: 0 },
        { type: "time", targets: 1 },
      ],
      columns: [
        { data: "hour_start" },
        { data: "hour_end" },
        { data: "date" },
        // STATUS
        {
          mRender: function(data, type, row) {
            if (row.status == "SCHEDULED") {
              return (
                '<button class="btn btn-secondary btn-sm" onclick="showSh(' +
                row.id +
                ')" data-id="' +
                row.id +
                '" data-toggle="modal"  data-target="#exampleModal">Agendado</button>'
              );
            } else if (row.status == "FINISHED") {
              return '<div class="badge badge-success">Finalizado</div>';
            } else if (row.status == null) {
              return '<div class="badge badge-info" style="color:white">Disponível</div>';
            } else if (row.status == "AUSENT") {
              return '<div class="badge badge-danger" style="color:white">Não compareceu</div>';
            } else {
              return "";
            }
          }
        },

        /* DELETE */ {
          mRender: function(data, type, row) {
            var token = $('meta[name="csrf-token"]').attr("content");
            return (
              '<form action="/painel/psicologo/schedules_users/' +
              row.id +
              '" method="POST">' +
              '<input type="hidden" name="_method" value="DELETE"/>' +
              '<input type="hidden" name="_token" value="' +
              token +
              '"/>' +
              '<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>' +
              "</form>"
            );
          }
        }
      ]
    });
  },
  created() {}
};
</script>
