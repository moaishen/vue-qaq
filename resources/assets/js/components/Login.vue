<template>
    <div id="login">
        <form @submit.stop.prevent="submit" class="form">
            <md-input-container md-theme="blue">
                <label>Username</label>
                <md-input maxlength="20" v-model="name" required></md-input>
            </md-input-container>

            <md-input-container>
                <label>Password</label>
                <md-input type="password" v-model="password" required></md-input>
            </md-input-container>
            <md-button class="md-raised md-primary md-dense" type="submit">Login</md-button>
        </form>
        <router-link to="/">back</router-link>
    </div>
</template>

<script>
    export default {
        name: 'login',
        data () {
            return {
                name: '',
                password: ''
            }
        },
        methods: {
            submit () {
                console.log(this.name)
                axios.get('/api/login', {
                    params: {
                        name: this.name,
                        password: this.password
                    }
                }).then(data => console.log(data.data))
            }
        }
    }
</script>

<style>
    #login {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    .form {
        display: flex;
        flex-direction: column;
        width: 25%;
        min-width: 200px;
    }
</style>