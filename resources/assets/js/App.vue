<template>
    <div id="app">
        <el-menu theme="dark" :default-active="active" class="el-menu" mode="horizontal" router>
            <el-menu-item index="1" class="logo">处理中心</el-menu-item>
            <div class="menu-items">
                <el-menu-item index="2" class="menu-item" :route="home">home</el-menu-item>
                <el-menu-item index="3" class="menu-item" :route="login">index</el-menu-item>
            </div>
        </el-menu>
        <el-row justify="center" type="flex">
            <el-col :xs="24" :sm="20" :md="20" :lg="18"><div class="grid-content bg-purple">
                <router-view></router-view>
            </div></el-col>
        </el-row>
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
                },
                index: {
                    path: '/index'
                },
                login: {
                    path: '/login'
                }
            }
        }
    }
</script>

<style scoped>
    @media (min-width: 768px) {
        .logo {
            margin-left: 10%!important;
        }
        .menu-items {
            float: right!important;
            margin-right: 10%!important;
        }
    }
    .bg-purple {
        background: #d3dce6;
    }
    .grid-content {
        border-radius: 4px;
        min-height: 36px;
        padding-top: 30px;
        min-height: 900px;
    }
</style>