<template>
    <div id="question">
        <div v-if="question.id">
            <h3>{{ question.title }}</h3>
            <h4><router-link :to="{ name: 'user', params: { id: question.author.id } }">{{ question.author.name }}</router-link> published at {{ question.created_at }}</h4>
            <p>{{ question.description }}</p>
            <el-card class="box-card" v-if="question.answers.length !== 0">
                <div v-for="(answer, index) in question.answers" class="text item" :key="'answer' + index">
                    <div class="answer">
                        <h4><router-link :to="{ name: 'user', params: { id: answer.author.id } }">{{ answer.author.name }}</router-link> published at {{ answer.updated_at }}</h4>
                        <p>{{ answer.content }}</p>
                    </div>
                </div>
            </el-card>
            <p v-else>No answers yet!</p>
        </div>
        <div v-else>
            <h2>no such question here!</h2>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'question',
        data() {
            return {
                question: {
                    id: null,
                    author: {},
                    answers: []
                }
            }
        },
        methods: {
            async getData() {
                const id = this.$route.params.id
                if (!id) {
                    return
                }
                const res = await axios.get('/api/question/' + id)
                if (res.data.status === 0) {
                    return
                }
                this.question = res.data
                console.log(res.data)
            }
        },
        created() {
            this.getData()
        },
        watch: {
            '$route': 'getData'
        }
    }
</script>