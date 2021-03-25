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
import routeMixin from "src/mixins/routeMixin";

export default {
  name: "Create",
  data() {
    return {
      config: {
        headers: {
          Authorization: "Bearer " + VueCookies.get("admin_access_token"),
        },
      },
      form: null,
       endpoints: {
        create: "api/users",
      },
    };
  },
  mixins: [routeMixin],

  components: { EditForm },

  methods: {
  
  },
};
</script>
