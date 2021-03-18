<template>
  <div class="q-pa-md fixed-center" style="max-width: 450px">
    <h3>Login Form</h3>
    <q-form @submit.prevent="onSubmit" class="q-gutter-md">
      <q-input
        filled
        v-model="form.email"
        label="Your Email"
        hint="example@admin.com"
        :error-message="form.errors.get('email')"
        :error="form.errors.has('email')"
      />
      <q-input
        filled
        type="password"
        v-model="form.password"
        label="Your Password"
        hint="password"
        :error-message="form.errors.get('password')"
        :error="form.errors.has('password')"
      />

      <div>
        <q-btn label="Sign in" type="submit" color="primary" />
      </div>
    </q-form>
  </div>
</template>
<script>
import { Form } from "vform";
import axios from 'axios'
import VueCookies from "vue-cookies";

export default {
  name: "Login",
  data() {
    return {
      // Create a new form instance
      form: new Form({
        email: "",
        password: "",
      }),
    };
  },

  methods: {
    onSubmit() {
      axios.defaults.withCredentials = true;
      axios
        .get("http://127.0.0.1:8001/sanctum/csrf-cookie")
        .then((response) => {
          this.form
            .post("http://127.0.0.1:8001/api/admin/login", {
              header: {
                Authorization: "XSRF-TOKEN " + VueCookies.get("XSRF_TOKEN"),
              },
            })
            .then((response) => {
              // console.log(response);
              // VueCookies.set("admin_access_token", response.data.token, "1h");
              // this.$router.push({ name: "admin.home" });
            });
        });
    },
  },
};
</script>