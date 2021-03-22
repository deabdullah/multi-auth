<template>
  <div class="q-pa-md" style="max-width: 450px">
    <q-form class="q-gutter-md">
      <q-input
        filled
        v-model="form.name"
        label="User Name"
        :error-message="form.errors.get('name')"
        :error="form.errors.has('name')"
      />
      <q-input
        filled
        v-model="form.email"
        label="User Email"
        :error-message="form.errors.get('email')"
        :error="form.errors.has('email')"
      />
      <q-input
        filled
        v-model="form.password"
        label="User Password"
        :error-message="form.errors.get('password')"
        :error="form.errors.has('password')"
      />
      <!-- <div>
        <q-btn label="Sign in" type="submit" color="primary" />
      </div> -->
    </q-form>
  </div>
</template>
<script>
import { Form } from "vform";

export default {
  name: "EditForm",
  mounted() {
    this.$emit("input", this.form);
  },
  data() {
    return {
      // Create a new form instance
      form: new Form({
        name: "",
        email: "",
        password: ""
      }),
    };
  },

  methods: {},
};
</script>
