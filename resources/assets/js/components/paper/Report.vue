<template>
    <div class="container">
        <form @submit.prevent="total" class="form-horizontal ">
            <div class="head">
                <h1>{{report.name}}</h1>
                <p>{{report.description}}</p>
            </div>
            <div class="body">
                <input type="hidden" name="_token" :value="token">
                <input type="hidden" name="report_id" :value="report.id">
                <div class="module" v-for="module in report.modules">
                    <!-- <h2>{{module.module_name}}</h2> -->
                    <div class="question" v-for="question in module.questions">
                        <h3>{{question.question_name}}</h3>
                        <div class="answer-wrap">
                          <div class="answer" v-for="(answer,index) in question.answers">
                              <label class="check-box"><input type="radio" :name="'answers['+module.id+']['+question.id+']'" :value="answer.id" required="true"><span></span>{{index | answerEn}}. {{answer.answer_name}}</label>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="btn-box">
                  <button type="submit" class="btn">提交</button>
                </div>
            </div>
          </form>
          <div class="foot">
            <p>呐呐科技 &copy; 2017</p>
          </div>
    </div>
</template>

<script>
    import Vue from 'vue'

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
                  console.log('提交成功')
                  alert('提交成功')
                  if (res.errno === ERR_OK) {
                      window.localStorage.setItem('report',JSON.stringify(res.paper))
                      window.location.href = "/live/live-eva/public/admin/report"
                  }
              })
            }
        }
    }
    Vue.filter('answerEn', (value) => {
      let en = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M' ,'N', 'O', 'P', 'Q', 'R', 'S']
      return en[value]
    })
</script>

<style>
  body,h1,h2,h3,h4,h5,h6,div,p {
    margin: 0;
    padding: 0;
  }
  body {
    background-color: #f8f8f8;
  }
  .container {

  }

  .head {
    padding: 1rem;
  }
  .head h1 {
    margin-bottom: .75rem;
    font-size: 20px;
    line-height: 1.6em;
    font-weight: 400;
  }
  .head p {
    font-size: 14px;
    line-height: 1.6em;
    color: #888;
  }
  .body .question {
    margin-bottom: 1rem;
  }

  .body .question h3 {
    padding: 0 1rem .5rem 1rem;
    font-size: 16px;
    color: #666;
    font-weight: normal;
  }

  .body .answer-wrap {
    padding: 0 0 0 1rem;
    border-top: 1px solid #eee;
    border-bottom: 1px solid #eee;
    background-color: #fff;
  }

  .body .answer {
    border-bottom: 1px solid #eee;
    background-color: #fff;
    font-size: 14px;
  }
  .body .answer:last-of-type {
    border-bottom: 0;
  }

  .check-box {
    position: relative;
    display: block;
    padding: .7rem 0;
    cursor: pointer;
    padding-left: 2rem;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
  }
  .check-box input[type="radio"] {
    position: absolute;
    left: 0;
    top: 50%;
    margin-top: -0.5rem;
    opacity: 0;
    filter: opacity(0);
  }
  .check-box span {
    position: absolute;
    left: 0;
    top: 50%;
    width: 1.15rem;
    height: 1.15rem;
    margin-top: -0.6rem;
    border: 1px solid #bbb;
    border-radius: 50%;
  }
  .check-box input[type="radio"]:checked + span {
    border-color: #1AAD19;
    background-color: #1AAD19;
  }
  .check-box span:after {
    content: '';
    position: absolute;
    left: .25rem;
    top: .35rem;
    width: .5rem;
    height: .25rem;
    border-left: 2px solid #fff;
    border-bottom: 2px solid #fff;
    transform: rotate(-45deg);
  }
  .btn-box {
    padding: 1rem;
    margin-bottom: 1rem;
  }
  .btn-box .btn {
    display: block;
    width: 100%;
    padding: .65rem;
    border: 0;
    border-radius: 4px;
    font-size: 16px;
    color: #fff;
    background-color: #1AAD19;
    outline: none;
  }
  .foot p {
    padding: .5rem;
    font-size: 12px;
    color: #999;
    text-align: center;
  }
</style>
