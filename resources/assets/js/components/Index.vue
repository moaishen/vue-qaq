<template>
    <div id="index">
        <div class="content">
            <el-row type="flex" justify="center" v-for="(question, index) in questions" :key="index">
                <el-col :span="20">
                    <div class="question" @click="handleClick(question.id)">
                        <h3>{{ question.title }}</h3>
                        <h4>{{ question.author.name }} published at {{ question.created_at }}</h4>
                        <p>{{ question.description }}</p>
                    </div>
                </el-col>
            </el-row>
        </div>
        <div class="pagination">
            <el-pagination
                    small
                    @current-change="handleCurrentChange"
                    :current-page="currentPage"
                    :page-size="pageSize"
                    layout="prev, pager, next"
                    :total="total"
                    class="center">
            </el-pagination>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'index',
        data () {
            return {
                questions: [],
                data: {},
                currentPage: 1,
                pageSize: 5,
                total: 100
            }
        },
        methods: {
            async getData (page = 1) {
               const res = await axios.get('/api/questions', {
                   params: {
                       page
                   }
               })
                console.log(res.data)
                this.questions = res.data.data
                this.currentPage = res.data.current_page
                this.pageSize = res.data.per_page
                this.total = res.data.total
            },
            handleCurrentChange (val) {
                this.getData(val)
            },
            handleClick (id) {
                if (!id) {
                    return
                }
                this.$router.push({name: 'question', params: { id }})
            }
        },
        created () {
            this.getData()
        }
    }
</script>

<style scoped>
    .test {
        height: 20px;
        border: 1px solid red;
        text-align: center;
    }
    #index, .content {
        min-height: 100%;
    }
    .pagination {
        position: relative;
        bottom: 0;
        text-align: center;
    }
    .question {
        background-color: #eee;
        border-radius: 6px;
        padding-left: 2px;
    }
</style>