<template>
    <div id="app">
        <el-menu theme="dark" :default-active="active" class="el-menu" mode="horizontal" router>
            <el-menu-item index="1">处理中心</el-menu-item>
            <el-menu-item index="2" :route="home">home</el-menu-item>
            <el-menu-item index="3"><a href="https://www.ele.me" target="_blank">订单管理</a></el-menu-item>
        </el-menu>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: 'app',
        data () {
            return {
                active: '1',
                home: {
                    path: '/'
                }
            }
        }
    }
</script>

<style scoped>
    .el-menu {
        display: flex;
        justify-content: space-around;
    }
</style>