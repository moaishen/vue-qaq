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
            <div class="page">
                <md-button class="md-raised md-primary" :disabled="is_loading || !prev_page_url" @click.native="_getPre">prev</md-button>
                <md-button class="md-raised md-primary" :disabled="is_loading || !next_page_url" @click.native="getNext">next</md-button>
            </div>
        </md-layout>
    </div>
</template>

<script>
    export default {
        name: 'index',
        data () {
            return {
                questions: [],
                prev_page_url: '',
                next_page_url: '',
                is_loading: false
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
                const data = await axios.get('/api/questions')
                this.questions = data.data.data
                this.prev_page_url = data.data.prev_page_url
                this.next_page_url = data.data.next_page_url
                this.is_loading = false
            },
            async _getData(url) {
                this.is_loading = true
                const data = await axios.get(url)
                this.questions = data.data.data
                this.prev_page_url = data.data.prev_page_url
                this.next_page_url = data.data.next_page_url
                this.is_loading = false
            },
            _getPre () {
                this._getData(this.prev_page_url)
            },
            getNext () {
                console.log(1)
                this._getData(this.next_page_url)
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
    .page {
        margin-top: 20px;
        max-height: 48px;
        width: 100%;
        display: flex;
        justify-content: space-around;
    }
</style>