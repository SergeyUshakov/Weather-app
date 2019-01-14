<template>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">
            <img :src="logoImg" alt="" class="d-inline-block align-top">
            <h1>Weather Forecast</h1>
        </a>
    </nav>
</template>

<script>
    export default {
        name: "NavBar",
        props:{

        },
        data() {
            return {
                logoImg: this.$route.path + '/img/flat-rock-logo.png'
            }
        }
    }
</script>

<style scoped>
    h1 {
        font-size: 3rem;
        margin: 26px 30px;
        display: inline-flex;
    }
</style>