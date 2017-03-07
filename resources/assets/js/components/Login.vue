<template>
    <div id="login">
        <el-row type="flex" justify="center" align="middle">
            <el-col :xs="20" :sm="10" class="login-form">
                <el-alert :title="errorMessage" type="error" v-if="errorMessage" @close="resetErrorMessage">
                </el-alert>
                <el-form :model="loginForm" :rules="rules" ref="loginForm">
                    <el-form-item label="用户名" prop="username">
                        <el-input type="text" v-model="loginForm.username" auto-complete="off"></el-input>
                    </el-form-item>
                    <el-form-item label="密码" prop="pass">
                        <el-input type="password" v-model="loginForm.pass" auto-complete="off"></el-input>
                    </el-form-item>
                    <el-form-item>
                        <el-button type="primary" @click="submitForm('loginForm')">提交</el-button>
                        <el-button @click="resetForm('loginForm')">重置</el-button>
                    </el-form-item>
                </el-form>
            </el-col>
        </el-row>
    </div>
</template>

<script>
    export default {
        name: 'login',
        data() {
            return {
                loginForm: {
                    pass: '',
                    username: ''
                },
                rules: {
                    pass: [
                        { required: true, message: '请输入密码', trigger: 'blur'}
                    ],
                    username: [
                        { required: true, message: '请输入用户名', trigger: 'blur' },
                        { min: 4, max: 20, message: '长度在 4 到 20 个字符', trigger: 'blur' }
                    ]
                },
                errorMessage: ''
            };
        },
        methods: {
            submitForm(formName) {
                this.$refs[formName].validate((valid) => {
                    if (valid) {
                        this.login()
                    } else {
                        console.log('error submit!!')
                        return false
                    }
                })
            },
            resetForm(formName) {
                this.$refs[formName].resetFields()
            },
            async login () {
                const url = '/api/login'
                const res = await axios.get(url, {
                    params: {
                        name: this.loginForm.username,
                        password: this.loginForm.pass
                    }
                })
                if (res.data.status === 0) {
                    this.errorMessage = res.data.msg
                }
            },
            resetErrorMessage () {
                this.errorMessage = ''
            }
        }
    }
</script>

<style scoped>
    .login-form {
        display: block;
    }
</style>