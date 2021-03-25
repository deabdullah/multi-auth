<template>
  <div class="q-pa-md">
    <q-table
      grid
      title="Users"
      :data="api.items"
      :columns="columns"
      row-key="name"
      :filter="filter"
      hide-header
      v-if="api.items"
      selection="multiple"
    >
      <template v-slot:top-right>
        <q-btn
          class="q-ma-sm"
          color="light-green"
          text-color="black"
          label="Create User"
          :to="{ name: 'users.create' }"
        />
        <q-input
          borderless
          dense
          debounce="300"
          v-model="filter"
          placeholder="Search"
        >
          <template v-slot:append>
            <q-icon name="search" />
          </template>
          
        </q-input>
      </template>
      <template v-slot:body-selection="scope">
        <q-btn
          class="q-ma-sm"
          color="white"
          text-color="black"
          @click="edit(scope.row.id)"
          label="Edit"
        />
        <q-btn
          color="red"
          text-color="black"
          @click="remove(scope.row.id)"
          label="Delete"
        />
      </template>
    </q-table>
  </div>
</template>
<script>
import VueCookies from "vue-cookies";
import listMixin from 'src/mixins/routeMixin'

export default {
  name: "Users",
  mixins: [listMixin],

  mounted() {
    this.get();
  },
  data() {
    return {
      filter: "",
      columns: [
        {
          name: "name",
          required: true,
          label: "User Name",
          align: "left",
          field: (row) => row.name,
          format: (val) => `${val}`,
          sortable: true,
        },
        {
          name: "email",
          align: "center",
          label: "Email",
          field: "email",
          sortable: true,
        },
        { name: "created_at", label: "Joined", field: "created_at", sortable: true },
      ],
      api: {
        items: null,
      },
      endpoints: {
        index: 'api/users',
        del: 'api/users/'
      },
      config: {
        headers: {
          Authorization: "Bearer " + VueCookies.get("admin_access_token"),
        },
      },
    };
  },
  methods: {
    
    edit(id) {
      console.log("editing user...");
      this.$router.push({ name: "users.edit", params: {user: id} });
    },
    
  },
};
</script>
