<template>
    <div id="navbar">
        <md-toolbar md-theme="blue">
            <md-button class="md-icon-button">
                <md-icon>menu</md-icon>
            </md-button>

            <h2 class="md-title" style="flex: 1">Vue QAQ</h2>

            <md-button class="md-raised">Add</md-button>
            <md-button class="md-raised md-warn">Remove</md-button>
        </md-toolbar>
    </div>
</template>

<script>
    export default {
        name: 'navbar'
    }
</script>

<style lang="scss">
    #navbar {
        width: 100%;
    }
</style>