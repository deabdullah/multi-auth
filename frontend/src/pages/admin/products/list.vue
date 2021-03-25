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
      selection="multiple"
    >
      <template v-slot:top-right>
        <q-btn
          class="q-ma-sm"
          color="light-green"
          text-color="black"
          label="Create Product"
          :to="{ name: 'products.create' }"
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
import listMixin from "src/mixins/routeMixin";
export default {
  name: "Products",
  mounted() {
    this.get();
  },
  mixins: [listMixin],
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
      endpoints: {
        index: "api/products",
        del: "api/products/",
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
      console.log("editing product...");
      this.$router.push({ name: "products.edit", params: { product: id } });
    },
  },
};
</script>
