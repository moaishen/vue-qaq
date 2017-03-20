<template>
    <div id="user">
        <h2>User:</h2>
        <h3>name: {{ user.name }}</h3>
        <h3 v-if="user.email">email: {{ user.email }}</h3>
        <h3>joined at {{ user.created_at }}</h3>
        <h2>Questions:</h2>
            <el-card class="box-card" v-if="questions.length !== 0">
                <div v-for="(question, index) in questions" class="text item" :key="'question' + index">
                    <div class="question" @click="handleQuestionClick(question.id)">
                        <h4>published at {{ question.updated_at}}</h4>
                        <h4>{{ question.title }}</h4>
                        <p>{{ question.description }}</p>
                    </div>
                </div>
            </el-card>
            <p v-else>No questions here!</p>
        <h2>Answers:</h2>
            <el-card class="box-card" v-if="answers.length !== 0">
                <div v-for="(answer, index) in answers" class="text item" :key="'answer' + index">
                    <div class="answer" @click="handleQuestionClick(answer.question_id)">
                        <h4>published at {{ answer.updated_at}}</h4>
                        <p>{{ answer.content }}</p>
                    </div>
                </div>
            </el-card>
            <p v-else>No answers here!</p>
    </div>
</template>

<script>
    export default {
        name: 'user',
        data() {
            return {
                questions: [],
                answers: [],
                user: {}
            }
        },
        methods: {
            async getQuestion() {
                const id = this.$route.params.id
                if (!id) {
                    return
                }
                const res = await axios.get('/api/userquestions/' + id)
                if (res.data.status === 0) {
                    return
                }
                this.questions = res.data
                console.log(res.data)
            },
            async getAnswers() {
                const id = this.$route.params.id
                if (!id) {
                    return
                }
                const res = await axios.get('/api/useranswers/' + id)
                if (res.data.status === 0) {
                    return
                }
                this.answers = res.data
                console.log(res.data)
            },
            async getUser() {
                const id = this.$route.params.id
                if (!id) {
                    return
                }
                const res = await axios.get('/api/user/' + id)
                if (res.data.status === 0) {
                    return
                }
                this.user = res.data
                console.log(res.data)
            },
            handleQuestionClick(id) {
                if (!id) {
                    return
                }
                this.$router.push({ name: 'question', params: { id } })
            }
        },
        created() {
            this.getQuestion()
            this.getAnswers()
            this.getUser()
        }
    }
</script>

<style>

</style>