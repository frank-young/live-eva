<template>
    <div class="container">
            <div class="row">
                <div class="head">
                    <h1>{{report.name}}（测评报告）</h1>
                    <p>{{report.description}}</p>
                </div>
                <div class="body">
                    <div class="module" v-for="module in report.modules">
                        <h2>{{module.report.report_name}}</h2>
                        <p>{{module.report.report_body}}</p>
                    </div>
                </div>
                <div class="foot">
                  <p>呐呐科技 &copy; 2017</p>
                </div>
            </div>
    </div>
</template>

<script>
    const ERR_OK = 0
    export default {
        data() {
            return {
                report: {}
            }
        },
        created() {
            this.default()
        },
        methods: {
            default() {
                this.report = window.localStorage.getItem('report') ? JSON.parse(window.localStorage.getItem('report')) : {}
            }
        }
    }
</script>

<style scoped>
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
.body {
  min-height: 85vh;
  padding: 1rem;
}
.module {
  margin-bottom: 2rem;

}
.module h2 {
  font-size: 16px;
  margin-bottom: 1rem;
  color: #333;
}

.module p {
  font-size: 14px;
  line-height: 1.7em;
  color: #555;
}

.foot p {
  padding: .5rem;
  font-size: 12px;
  color: #999;
  text-align: center;
}
</style>
