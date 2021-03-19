<template>
  <div class="q-ma-xl">
    <h4 class="q-ml-md">Create Product</h4>
    <EditForm v-model="form" />
    <q-btn label="Create Product" class="q-ml-md" @click="create" color="green" />
  </div>
</template>
<script>
import VueCookies from "vue-cookies";
import EditForm from "./_Form";
export default {
  name: "Create",
  data() {
    return {
      config: {
        headers: {
          Authorization: "Bearer " + VueCookies.get("admin_access_token"),
        },
      },
      form: null
    };
  },
  components: { EditForm },
 
  methods: {
 
    create() {
      this.form
        .post(
          "http://127.0.0.1:8001/api/products",
          this.config
        )
        .then((response) => {
          this.$router.push({ name: "products.list" });
        });
    },
  },
};
</script>
