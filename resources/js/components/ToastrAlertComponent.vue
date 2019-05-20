<script>
export default {
    props: {
        alertMessage: String,
        alertType: {
            type: String,
            default: 'show', // show | success | info | error | register
        },
    },
    created: function () {
        this.options = {
            theme: "bubble",
            duration : 5000,
            keepOnHover: true,
        }
        switch (this.alertType) {
            case 'show':
                this.options.icon = '';
                this.$toasted.show(this.alertMessage, this.options);
                break;
            case 'success':
                this.options.icon = 'far fa\-check\-circle';
                console.log(this.options);
                this.$toasted.success(this.alertMessage, this.options);
                break;
            case 'info':
                this.options.icon = '';
                this.$toasted.info(this.alertMessage, this.options);
                break;
            case 'error':
                this.options.icon = 'far fa\-times\-circle';
                this.$toasted.error(this.alertMessage, this.options);
                break;
            case 'register':
                this.options.icon = '';
                this.$toasted.register(this.alertMessage, this.options);
                break;
            default:
                this.options.icon = '';
                this.$toasted.show(this.alertMessage, this.options);
        }
    },
    render: function() {
      	return; // avoid warning message since we have no template
    },
}
</script>