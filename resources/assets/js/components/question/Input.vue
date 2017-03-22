<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
              <div class="panel panel-default">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col-md-8">
                        <p>问题</p>
                      </div>
                      <div class="col-md-4 text-right">
                        <a class="btn btn-info" @click="addQuestion">添加问题</a>
                      </div>
                    </div>
                  </div>
                  <div class="panel-body">
                    <div class="side-list-wrap">
                      <div class="side-list-item" v-for="question in questions">
                          <a href="#" @click="editQuestion(question.id)">{{question.question_name}} {{question.id}} </a>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-md-8 ">
                <div class="panel panel-default" v-show="isAdd">
                    <div class="panel-heading">
                      <div class="row">
                        <div class="col-md-12">
                          <p>添加问题</p>
                        </div>
                      </div>
                    </div>
                    <div class="panel-body">
                      <form @submit.prevent="submit" class="form-horizontal">
                        <input type="hidden" name="_token" :value="token">
                        <input type="hidden" name="len" v-model="answers.length">
                        <input type="hidden" name="module_id" v-model="id">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input type="text" name="question_name" class="form-control" required="required" v-model="name" placeholder="请输入标题">
                            </div>
                        </div>
                        <div class="form-group" v-for="(answer,index) in answers">
                            <div class="col-xs-8">
                                <input type="text" :name="'answer_name' + index" required="required" class="form-control" v-model="answer.answer_name" placeholder="答案">
                            </div>
                            <div class="col-xs-2">
                              <input type="text" :name="'score' + index" required="required" class="form-control" placeholder="分值" v-model="answer.score">
                            </div>
                            <div class="col-xs-2">
                              <a href="#" class="btn btn-danger" @click="deleteAnswer(answers, index)">删除</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <button type="button" class="btn btn-block btn-add" @click="addAnswer(answers)">新建选项</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 control-label">
                            </div>
                            <div class="col-sm-8 text-right">
                                <button type="submit" class="btn btn-info">确认</button>
                            </div>
                        </div>
                    </form>

                    </div>
                </div>
                <!-- split -->
                <div class="panel panel-default" v-show="!isAdd">
                    <div class="panel-heading">
                      <div class="panel-heading">
                        <div class="row">
                          <div class="col-md-12">
                            <p>编辑问题</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="panel-body">
                      <form @submit.prevent="submitEdit" class="form-horizontal comment-input">
                        <input type="hidden" name="_token" :value="token">
                        <input type="hidden" name="len" v-model="answersEdit.length">
                        <input type="hidden" name="id" v-model="questionEdit.id">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input type="text" name="question_name" class="form-control" required="required" v-model="questionEdit.question_name" placeholder="请输入标题">
                            </div>
                        </div>
                        <div class="form-group" v-for="(answer,index) in answersEdit">
                              <input type="hidden" :name="'answer_id' + index" v-model="answer.id">
                            <div class="col-xs-8">
                                <input type="text" :name="'answer_name' + index" required="required" class="form-control" v-model="answer.answer_name" placeholder="答案">
                            </div>
                            <div class="col-xs-2">
                              <input type="text" :name="'score' + index" required="required" class="form-control" placeholder="分值" v-model="answer.score">
                            </div>
                            <div class="col-xs-2">
                              <a href="#" class="btn btn-danger" @click="deleteAnswer(answersEdit, index)">&times;</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <button type="button" class="btn btn-block btn-add" @click="addAnswer(answersEdit)">新建选项</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 control-label">
                            </div>
                            <div class="col-sm-8 text-right">
                                <button type="submit" class="btn btn-info">确认</button>
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
                defaultLen: 5,
                answers: [],
                questions: [],
                name: '',
                token: window.Laravel.csrfToken,
                isAdd: true,
                questionEdit: {},
                answersEdit: []
            }
        },
        created() {
            this.answers = this._createOriginAnswer(this.defaultLen)
            this._getQuestionsTitleData()
        },
        methods: {
            submit(event) {
                // 提交
                let options = {}
                let formData = new FormData(event.target)

                options.headers = {'Content-Type': 'application/x-www-form-urlencoded'}
                options.emulateJSON = true

                this.$http.post('../question', formData, options).then((res) => {
                    res = res.body
                    if (res.errno === ERR_OK) {
                        this.name = ''
                        this.answers = this._createOriginAnswer(this.defaultLen)
                        this._getQuestionsTitleData()
                    }
                })
            },
            submitEdit(event) {
                // 编辑提交
                let options = {}
                let formData = new FormData(event.target)

                options.headers = {'Content-Type': 'application/x-www-form-urlencoded'}
                options.emulateJSON = true

                this.$http.post('../question/update', formData, options).then((res) => {
                    res = res.body
                    if (res.errno === ERR_OK) {
                        this.name = ''
                        this.answers = this._createOriginAnswer(this.defaultLen)
                        this._getQuestionsTitleData()
                    }
                })
            },
            addQuestion() {
                // 添加问题，这里编辑和添加模块做了隐藏互换。
                this.isAdd = true
            },
            editQuestion(id) {
                // 编辑问题
                this.isAdd = false
                this._getQuestionData(id)
            },
            _createOriginAnswer(len) {
                // 创建原始答案
                let arr = []
                for (var i = 0; i < len; i++) {
                    let obj = {
                        index: i,
                        answer_name: '答案' + i,
                        score: i + 1
                      }
                      arr.push(obj)
                }
                return arr
            },
            addAnswer(answers) {
              // 添加答案
              let i = answers.length
              let obj = {
                    index: i,
                    answer_name: '新添',
                    score: i + 1
                  }
              answers.push(obj)
            },
            deleteAnswer(answers, index) {
              // 删除答案
              answers.splice(index, 1)
            },
            _getQuestionsTitleData() {
              // 获取问题标题列表数据
              this.$http.get('../question/' + this.id).then((res) => {
                  res = res.body
                  if (res.errno === ERR_OK) {
                      this.questions = res.questions
                  }
              })
            },
            _getQuestionData(id) {
              // 获取单个问题数据
              this.$http.get('../question/' + id + '/edit').then((res) => {
                  res = res.body
                  if (res.errno === ERR_OK) {
                      this.questionEdit = res.question
                      this.answersEdit = res.answers
                  }
              })
            },
        }
    }
</script>
<style media="screen" lang="less">

</style>
