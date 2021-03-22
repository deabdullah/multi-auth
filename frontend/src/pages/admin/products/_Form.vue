<template>
  <div class="q-pa-md" style="max-width: 450px">
    <q-form class="q-gutter-md">
      <q-input
        filled
        v-model="form.name"
        label="Product Name"
        :error-message="form.errors.get('name')"
        :error="form.errors.has('name')"
      />
      <q-input
        filled
        v-model="form.price"
        label="Product Price"
        :error-message="form.errors.get('price')"
        :error="form.errors.has('price')"
      />
      <q-input
        filled
        v-model="form.detail"
        label="Product Detail"
        :error-message="form.errors.get('detail')"
        :error="form.errors.has('detail')"
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
        detail: "",
        price: ""
      }),
    };
  },

  methods: {},
};
</script>
