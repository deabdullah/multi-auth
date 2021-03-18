<template>
  <div class="q-pa-md">
    <q-table
      grid
      title="Products"
      :data="api.items"
      :columns="columns"
      row-key="name"
      :filter="filter"
      hide-header
      v-if="api.items"
    >
      <template v-slot:top-right>
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
    </q-table>
  </div>
</template>
<script>
import axios from "axios";
import VueCookies from "vue-cookies";
export default {
  name: "Products",
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
          label: "Item Name",
          align: "left",
          field: (row) => row.name,
          format: (val) => `${val}`,
          sortable: true,
        },
        {
          name: "detail",
          align: "center",
          label: "Description",
          field: "detail",
          sortable: true,
        },
        { name: "price", label: "Price ($)", field: "price", sortable: true },
      ],
      api: {
        items: null,
      },
    };
  },
  methods: {
    get() {
      axios
        .get("http://127.0.0.1:8000/sanctum/csrf-cookie")
        .then((response) => {
          axios
            .get("http://127.0.0.1:8000/api/products", { 
              headers: {
                Authorization: "Bearer" + VueCookies.get("admin_access_token"),
              },
            })
            .then((response) => {
              console.log(response.data);
              this.api.items = response.data.items;
            });
        });
    },
  },
};
</script>
