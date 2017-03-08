<template>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">这是添加的input</div>

                    <div class="panel-body">
                      <form @submit.prevent="submit"  method="POST" class="form-horizontal comment-input">
                        <input type="hidden" name="_token" :value="token">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input type="text" name="question_name" class="form-control" required="required" placeholder="请输入标题">
                            </div>
                        </div>
                        <div class="form-group" v-for="input in inputArr">
                            <div class="col-xs-10">
                                <input type="text" name="question_name" class="form-control" v-model="input.value" placeholder="答案">
                            </div>
                            <div class="col-xs-2">
                              <input type="text" name="score" class="form-control" placeholder="分值" :value="input.score">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 control-label">
                            </div>
                            <div class="col-sm-8 text-right">
                                <button class="btn btn-primary">确认</button>
                            </div>
                        </div>
                    </form>

                    </div>
                </div>
            </div>
        </div>

</template>

<script>
    export default {
        props: {
            token: {
                type: String
            }
        },
        data() {
            return {
                inputArr: []
            }
        },
        created() {
            this.inputArr = this._createOrigin(5)
        },
        methods: {
            submit(event) {
                let options = {}
                let formData = new FormData(event.target)

                options.headers = {'Content-Type': 'application/x-www-form-urlencoded'}
                options.emulateJSON = true

                this.$http.post('/blog/public/comment', formData, options).then((res) => {
                    res = res.body
                    if (res.errno === ERR_OK) {
                        this.content = ''

                    }
                })
            },
            _createOrigin(len) {
                let arr = []
                for (var i = 0; i < len; i++) {
                    let obj = {
                        index: i,
                        value: '',
                        score: i + 1
                      }
                      arr.push(obj)
                }
                return arr
            }
        }
    }
</script>
