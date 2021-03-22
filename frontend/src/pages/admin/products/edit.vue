<template>
  <div class="q-ma-xl">
    <h4 class="q-ml-md">Edit Product</h4>
    <EditForm v-model="form" />
    <q-btn label="Save Product" class="q-ml-md" @click="update" color="green" />
  </div>
</template>
<script>
import VueCookies from "vue-cookies";
import EditForm from "./_Form";
export default {
  name: "Edit",
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
  mounted() {
    this.edit();
  },
  methods: {
    edit() {
      this.$axios
        .get(
          "http://ma-server.test/api/products/" +
            this.$route.params.product +
            "/edit",
          this.config
        )
        .then((response) => {
        //   Object.keys(this.form).forEach((key) => {
        //     console.log(this.form[key]);
        //     this.form[key] = response.data.product[key];
        //   });
          Object.keys(response.data.product).forEach((key) => {

          this.form[key] = response.data.product[key];

          });
        });
    },
    update() {
      this.form
        .patch(
          "http://ma-server.test/api/products/" + this.$route.params.product,
          this.config
        )
        .then((response) => {
          this.$router.push({ name: "products.list" });
        });
    },
  },
};
</script>
