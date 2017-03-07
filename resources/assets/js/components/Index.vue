<template>
    <div id="index">
        <el-row type="flex">
            <el-col :span="24">
                <div class="test">xsnjxnsj</div>
                <div class="block">
                    <span class="demonstration">显示总数</span>
                    <el-pagination
                            @current-change="handleCurrentChange"
                            :current-page="currentPage"
                            :page-size="pageSize"
                            layout="total, prev, pager, next"
                            :total="total">
                    </el-pagination>
                </div>
            </el-col>
        </el-row>
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
                pageSize: 7,
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
                this.currentPage = res.data.current_page
                this.pageSize = res.data.per_page
                this.total = res.data.total
            },
            handleCurrentChange (val) {
                this.getData(val)
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
    }
</style>