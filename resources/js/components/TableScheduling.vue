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
  methods: {},
  mounted() {
    $("#table-scheduling").DataTable({
      ajax: {
        url: "/painel/psicologo/mySchedules",
        method: "GET",
        dataSrc: "data"
      },
      columns: [{ data: "hour_start" }, { data: "hour_end" }, { data: "date" },{data:'status'}]
    });
  },
  created() {}
};
</script>
