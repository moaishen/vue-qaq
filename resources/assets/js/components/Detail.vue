<template>
    <div id="detail">
        <md-layout md-gutter>
            <md-layout md-flex="80" md-flex-offset="10">
                <md-card md-with-hover class="question-card">
                    <md-card-header>
                        <div class="md-title">{{ question.title }}</div>
                        <div class="md-subhead">{{ author.name }}</div>
                    </md-card-header>

                    <md-card-content>
                        {{ question.description }}
                    </md-card-content>

                    <md-card-actions>
                        <md-button>Action</md-button>
                        <md-button>Action</md-button>
                    </md-card-actions>
                </md-card>
                <md-card md-with-hover class="answer-card" v-for="answer in question.answers">
                    <md-card-header>
                        <div class="md-title">{{ answer.author.name }}</div>
                    </md-card-header>

                    <md-card-content>
                        {{ answer.content }}
                    </md-card-content>
                </md-card>
            </md-layout>
        </md-layout>
    </div>
</template>

<script>
    export default {
        name: 'detail',
        data () {
            return {
                question: {},
                id: this.$route.params.id,
                author: {}
            }
        },
        watch () {
            $route: 'getData'
        },
        created () {
            this.getData()
        },
        methods: {
            async getData() {
                this.is_loading = true
                const data = await axios.get('/api/question/' + this.id)
                this.question = data.data
                this.author = data.data.author
                console.log(this.question.author.name)
            }
        }
    }
</script>

<style>
    #detail {
        min-height: 800px;
        border: 1px solid green;
        display: flex;
    }
    .question-card {
        max-height: 220px;
        margin-top: 10px;
    }
    .question-content {
        margin-top: 20px;
    }
    .page {
        margin-top: 20px;
        max-height: 48px;
        width: 100%;
        display: flex;
        justify-content: space-around;
    }
</style>