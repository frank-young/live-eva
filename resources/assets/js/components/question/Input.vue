<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
              <div class="panel panel-default">
                  <div class="panel-heading">问题</div>

                  <div class="panel-body">
                      <div class="" v-for="question in questions">
                          <a href="#" @click="edit">{{question.question_name}}</a>
                      </div>
                  </div>
                </div>
            </div>
            <div class="col-md-8 ">
                <div class="panel panel-default">
                    <div class="panel-heading">新添问题</div>

                    <div class="panel-body">
                      <form @submit.prevent="submit"  method="POST" class="form-horizontal comment-input">
                        <input type="hidden" name="_token" :value="token">
                        <input type="hidden" name="len" v-model="inputArr.length">
                        <input type="hidden" name="module_id" v-model="id">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input type="text" name="question_name" class="form-control" required="required" v-model="name" placeholder="请输入标题">
                            </div>
                        </div>
                        <div class="form-group" v-for="(input,index) in inputArr">
                            <div class="col-xs-8">
                                <input type="text" :name="'answer_name' + index" required="required" class="form-control" v-model="input.value" placeholder="答案">
                            </div>
                            <div class="col-xs-2">
                              <input type="text" :name="'score' + index" required="required" class="form-control" placeholder="分值" v-model="input.score">
                            </div>
                            <div class="col-xs-2">
                              <a href="#" class="btn btn-danger" @click="deleteAnswer(index)">&times;</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <button type="button" class="btn btn-block btn-primary" @click="addAnswer">新建选项</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 control-label">
                            </div>
                            <div class="col-sm-8 text-right">
                                <button type="submit" class="btn btn-primary">确认</button>
                            </div>
                        </div>
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    const ERR_OK = 0

    export default {
        props: {
            id: {
                type: Number
            }
        },
        data() {
            return {
                inputArr: [],
                questions: [],
                name: '',
                token: window.Laravel.csrfToken
            }
        },
        created() {
            this.inputArr = this._createOriginAnswer(4)
            this._getQuestionsData()
        },
        methods: {
            submit(event) {
                let options = {}
                let formData = new FormData(event.target)

                options.headers = {'Content-Type': 'application/x-www-form-urlencoded'}
                options.emulateJSON = true

                this.$http.post('/live/live-eva/public/admin/question', formData, options).then((res) => {
                    res = res.body
                    if (res.errno === ERR_OK) {
                        this.name = ''
                        this.inputArr = this._createOriginAnswer(4)
                        this._getQuestionsData()
                    }
                })
            },
            edit() {

            },
            _createOriginAnswer(len) {
                let arr = []
                for (var i = 0; i < len; i++) {
                    let obj = {
                        index: i,
                        value: '答案' + i,
                        score: i + 1
                      }
                      arr.push(obj)
                }
                return arr
            },
            addAnswer() {
              let obj = {
                    index: this.inputArr.length,
                    value: '',
                    score: this.inputArr.length + 1
                  }
              this.inputArr.push(obj)
            },
            deleteAnswer(index) {
              this.inputArr.splice(index, 1)
            },
            _getQuestionsData() {
              this.$http.get('../question/api/show/' + this.id).then((res) => {
                  res = res.body
                  if (res.errno === ERR_OK) {
                      this.questions = res.questions
                  }
              })
            }
        }
    }
</script>
<style media="screen" lang="less">

</style>
