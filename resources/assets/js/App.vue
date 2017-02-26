<template>
    <div id="app">
        <md-layout md-gutter>
            <md-layout ></md-layout>
            <md-layout md-flex-xsmall="100" md-flex-small="100" md-flex-medium="80" md-flex-large="80">
                <navbar></navbar>
                <transition name="md-router" appear>
                    <router-view class="main-container"></router-view>
                </transition>
            </md-layout>
            <md-layout></md-layout>
        </md-layout>
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
        },
        methods: {
            toggleLeftSidenav() {
                this.$refs.leftSidenav.toggle();
            },
            toggleRightSidenav() {
                this.$refs.rightSidenav.toggle();
            },
            closeRightSidenav() {
                this.$refs.rightSidenav.close();
            },
            open(ref) {
                console.log('Opened: ' + ref);
            },
            close(ref) {
                console.log('Closed: ' + ref);
            }
        }
    }
</script>

<style lang="scss">
    .main-container {
        display: flex;
        flex: 1;
        min-height: 450px;
        width: 100%;
        border: 1px solid red;
        padding-left: 15px;
        padding-right: 15px;
        @media (min-width: 768px) {
            min-height: 850px;
        }
    }
</style>