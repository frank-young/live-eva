<template>
    <div class="container">
        <form @submit.prevent="total" class="form-horizontal comment-input">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <h1>{{report.name}}</h1>
                </div>
                <div class="col-md-8 col-md-offset-2">
                    <input type="hidden" name="_token" :value="token">
                    <div class="" v-for="(module,index) in report.modules">
                        <h2>{{module.module_name}}</h2>
                        <div class="" v-for="(question,i) in module.questions">
                            <h3>{{question.question_name}}</h3>
                            <div class="" v-for="answer in question.answers">
                                <label><input type="radio" :name="'answer' + index + i" :value="answer.score">{{answer.answer_name}} ----------- {{answer.score}}分 </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-md-offset-2">
                    <button type="submit" class="btn btn-primary">提交</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        props: {
            report: {
                type: Object
            }
        },
        data() {
            return {
                picked: [],
                token: window.Laravel.csrfToken
            }
        },
        created() {
            console.log(this.report)
        },
        methods: {
            select(id,value){
                // alert(value)
            },
            total(event) {
              let options = {}
              let formData = new FormData(event.target)
              console.log(this.picked)
              // options.headers = {'Content-Type': 'application/x-www-form-urlencoded'}
              // options.emulateJSON = true
              //
              // this.$http.post('../question', formData, options).then((res) => {
              //     res = res.body
              //     if (res.errno === ERR_OK) {
              //         this.name = ''
              //         this.answers = this._createOriginAnswer(this.defaultLen)
              //         this._getQuestionsTitleData()
              //     }
              // })
            }
        }
    }
</script>
