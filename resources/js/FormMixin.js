export default {
    data() {
        return {
            route: '',
            fields: {},
            errors: {},
            success: false,
            loading: false,
            loaded: true,
        }
    },
    methods: {
        submit() {
            if (this.loaded) {
                this.loading = true;
                this.loaded = false;
                this.errors = {};
                axios.post(this.route, this.fields).then(response => {
                    this.loading = false;
                    this.loaded = true;
                    this.success = true;
                    this.successAlert();
                }).catch(error => {
                    this.loading = false;
                    this.loaded = true;
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors || {};
                        return;
                    }
                    this.errorAlert();
                });
            }
        },
        successAlert() {
            swal("Submitted!", "Successfully saved all information.", "success");
        },
        errorAlert() {
            swal("Failed to submit!", "Something has gone wrong on the web site's server. Please try again in a few minutes or contact IT support.", "error");
        }
    },
}