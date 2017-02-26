<template>
    <div id="app" class="container">
        <navbar></navbar>
        <router-view></router-view>
    </div>
</template>

<script>
    import Navbar from './components/Navbar'
    export default {
        name: 'app',
        components: {
            Navbar
        },
        created () {
            console.log(1)
        }
    }
</script>

<style>
    .container {
        margin-right: auto;
        margin-left: auto;
        padding-left: 15px;
        padding-right: 15px;
    }
    @media (min-width: 768px) {
        .container {
            width: 750px;
        }
    }
    @media (min-width: 992px) {
        .container {
            width: 970px;
        }
    }
    @media (min-width: 1200px) {
        .container {
            width: 1170px;
        }
    }
</style>