import VueCookies from "vue-cookies";

export default {
    data() {
        return {
            baseUrl: "http://ma-server.test/",
        }
    },
    methods: {
        get() {

            this.$axios
                .get(this.baseUrl + this.endpoints.index, this.config)
                .then((response) => {
                    this.api.items = response.data.items;
                });

        },
        edit() {
            this.$axios
                .get(
                    this.baseUrl + this.endpoints.edit, this.config)
                .then((response) => {

                    Object.keys(response.data.item).forEach((key) => {

                        this.form[key] = response.data.item[key];

                    });
                });
        },
        update() {
            this.form
                .patch(
                    this.baseUrl + this.endpoints.update,
                    this.config
                )
                .then((response) => {
                    this.$router.push({ name: "admin.home" });
                });
        },
        create() {
            this.form
                .post(
                    this.baseUrl + this.endpoints.create,
                    this.config
                )
                .then((response) => {
                    this.$router.push({ name: "admin.home" });
                });
        },
        remove(id) {
            this.$axios
                .delete(this.baseUrl + this.endpoints.del + id, this.config)
                .then((response) => {
                    this.get();
                    alert("Deleted");
                });
        },
        onLogin() {
            this.$axios
                .get(this.baseUrl + this.endpoints.token)
                .then((response) => {
                    VueCookies.set('X-XSRF-TOKEN', VueCookies.get("csrf-cookie"));
                });
            this.form
                .post(this.baseUrl + this.endpoints.login)
                .then((response) => {
                    // console.log(response);
                    VueCookies.set("admin_access_token", response.data.token, "1h");
                    this.$router.push({ name: "admin.home" });
                });
        },

    }


}