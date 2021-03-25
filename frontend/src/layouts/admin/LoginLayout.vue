<template>
  <div class="q-pa-md fixed-center" style="max-width: 450px">
    <h3>Login Form</h3>
    <q-form @submit.prevent="onLogin" class="q-gutter-md">
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
import VueCookies from "vue-cookies";
import routeMixin from "src/mixins/routeMixin";

export default {
  name: "Login",
  data() {
    return {
      // Create a new form instance
      form: new Form({
        email: "",
        password: "",
      }),
      endpoints: {
        login: "api/admin/login",
        token: "sanctum/csrf-cookie"
      },
    };
  },
  mixins: [routeMixin],

  methods: {},
};
</script>