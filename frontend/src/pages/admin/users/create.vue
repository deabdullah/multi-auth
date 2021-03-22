<template>
  <div class="q-ma-xl">
    <h4 class="q-ml-md">Create User</h4>
    <EditForm v-model="form" />
    <q-btn label="Create User" class="q-ml-md" @click="create" color="green" />
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
          "http://ma-server.test/api/users",
          this.config
        )
        .then((response) => {
          this.$router.push({ name: "users.list" });
        });
    },
  },
};
</script>
