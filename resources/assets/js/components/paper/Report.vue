<template>
    <div class="container">
        <form @submit.prevent="total" class="form-horizontal ">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <h1>{{report.name}}</h1>
                </div>
                <div class="col-md-8 col-md-offset-2">
                    <input type="hidden" name="_token" :value="token">
                    <input type="hidden" name="report_id" :value="report.id">
                    <div class="" v-for="module in report.modules">
                        <h2>{{module.module_name}}</h2>
                        <div class="" v-for="question in module.questions">
                            <h3>{{question.question_name}}</h3>
                            <div class="" v-for="answer in question.answers">
                                <label><input type="radio" :name="'answers['+module.id+']['+question.id+']'" :value="answer.id" >{{answer.answer_name}} ----------- {{answer.score}}分 </label>
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
    const ERR_OK = 0
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
            total(event) {
              let options = {}
              let formData = new FormData(event.target)

              options.headers = {'Content-Type': 'application/x-www-form-urlencoded'}
              options.emulateJSON = true
              this.$http.post('/live/live-eva/public/paper/ctrl', formData, options).then((res) => {
                  res = res.body
                  if (res.errno === ERR_OK) {
                      window.localStorage.setItem('report',JSON.stringify(res.paper))
                      window.location.href = "/live/live-eva/public/admin/report"
                  }
              })
            }
        }
    }
</script>
