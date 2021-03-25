<template>
  <div class="q-ma-xl">
    <h4 class="q-ml-md">Edit User</h4>
    <EditForm v-model="form" />
    <q-btn label="Save User" class="q-ml-md" @click="update" color="green" />
  </div>
</template>
<script>
import VueCookies from "vue-cookies";
import EditForm from "./_Form";
import routeMixin from "src/mixins/routeMixin";

export default {
  name: "Edit",
  data() {
    return {
      config: {
        headers: {
          Authorization: "Bearer " + VueCookies.get("admin_access_token"),
        },
      },
      form: null,
      endpoints: {
        edit: "api/users/" + this.$route.params.user + "/edit",
        update: "api/users/" + this.$route.params.user,
      },
    };
  },
  components: { EditForm },
  mixins: [routeMixin],

  mounted() {
    this.edit();
  },
  methods: {},
};
</script>
