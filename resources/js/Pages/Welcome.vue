<template>
    <div></div>
</template>

<script>

export default {
    methods: {
        isRedirect() {
           if (!this.$attrs.auth.user) {
               window.location.href = 'login'
           } window.location.href = 'qr-codes'
        }
    },

    beforeMount() {
        this.isRedirect()
    }
}
</script>
