<template>
    <div id="index">
        <md-layout md-gutter>
            <md-layout md-flex="80" md-flex-offset="10">
                <md-card md-with-hover class="question-card " v-for="question in questions">
                    <md-card-header>
                        <div class="md-subhead">{{ question.title }}</div>
                    </md-card-header>

                    <md-card-content>
                        {{ question.description }}
                    </md-card-content>
                </md-card>
            </md-layout>
        </md-layout>
    </div>
</template>

<script>
    export default {
        name: 'index',
        data () {
            return {
                questions: [],
                pre_page_url: '',
                next_page_url: ''
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
                const data = await axios.get('/api/questions')
                this.questions = data.data.data
                console.log(this.questions)
            }
        }
    }
</script>

<style>
    #index {
        min-height: 800px;
        border: 1px solid green;
        display: flex;
    }
    .question-card {
        max-height: 120px;
        margin-top: 10px;
    }
    .question-content {
        margin-top: 20px;
    }
</style>