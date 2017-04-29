<template>
    <div class="container">
            <div class="row">
                <div class="head">
                    <h1>{{report.name}}（报告）</h1>
                    <p>{{report.description}}</p>
                </div>
                <div class="body">
                  <h2>
                    三、测评报告结果
                  </h2>
                  <div class="chart">
                    <div id="main" style="width: 100%;height:300px;"></div>
                  </div>
                  <div class="module" v-for="module in report.modules">
                      <h3>{{module.report.report_name}} 得分：{{module.sum}} </h3>
                      <div class="module-content" v-html="module.report.report_body"></div>
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
                report: {},
                sumArr: []
            }
        },
        created() {
            this.default()
            this._getSumValue()
            this.$nextTick(() => {
              this.chart()
            })
        },
        methods: {
            default() {
                this.report = window.localStorage.getItem('report') ? JSON.parse(window.localStorage.getItem('report')) : {}
            },
            _getSumValue () {
              this.report.modules.forEach((v) => {
                this.sumArr.push(v.sum)
              })
            },
            chart() {
              var myChart = echarts.init(document.getElementById('main'))
              let option = {
                  tooltip : {
                      trigger: 'axis',
                      axisPointer : {
                          type : 'shadow'
                      },
                      formatter: "{b}:{c4}"
                  },

                  legend: {
                      data:['正常','轻度','中度','重度','您的值']
                  },
                  grid: {
                      left: '3%',
                      right: '4%',
                      bottom: '3%',
                      containLabel: true
                  },
                  xAxis : [
                      {
                          type : 'category',
                          data : ['前庭','脑神经','触觉','发育','空间形态','重力']
                      }
                  ],
                  yAxis : [
                      {
                          type : 'value'
                      }
                  ],
                  series : [
                      {
                          name:'正常',
                          type:'bar',
                          stack: '原始',
                          data:[16, 18, 23, 16, 7, 15],
                          itemStyle: {
                              normal: {
                                  color: '#009966'
                              }
                          },
                      },
                      {
                          name:'轻度',
                          type:'bar',
                          stack: '原始',
                          data:[5, 6, 7, 8, 3, 7],
                          itemStyle: {
                              normal: {
                                  color: '#3388cc'
                              }
                          },
                      },
                      {
                          name:'中度',
                          type:'bar',
                          stack: '原始',
                          data:[6, 6, 7, 8, 4, 7],
                          itemStyle: {
                              normal: {
                                  color: '#FF9900'
                              }
                          },
                      },
                      {
                          name:'重度',
                          type:'bar',
                          stack: '原始',
                          data:[11, 8, 15, 13, 6, 11],
                          itemStyle: {
                              normal: {
                                  color: '#FF0033'
                              }
                          },
                      },
                      {
                          name: '您的值',
                          type: 'bar',
                          data: this.sumArr,
                          itemStyle: {
                              normal: {
                                  color: '#00aeef'
                              }
                          }
                      }

                  ]
              }
              myChart.setOption(option)
            }
        }
    }
</script>

<style scoped>
.head {
  padding: 1rem;
}
.head h1 {
  margin-bottom: .75rem;
  font-size: 20px;
  line-height: 1.6em;
  font-weight: 400;
}
.head h2 {
  margin-bottom: .75rem;
  font-size: 18px;
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
.body h2 {
  margin-bottom: .75rem;
  font-size: 18px;
  line-height: 1.6em;
  font-weight: 400;
  text-align: left;
}
.body .chart {
  margin-bottom: 2rem;
}

.module {
  margin-bottom: 2rem;

}
.module h3 {
  font-size: 16px;
  margin-bottom: 1rem;
  text-align: left;
  color: #333;
}

.module .module-content h3 {
  line-height: 1.8em;
  font-size: 16px;
  line-height: 1.7em;
  color: #333 !important;
  margin-bottom: 10px;
}

.module .module-content p {
  margin-bottom: 10px;
  text-indent: 2em;
}

.module .module-content{
  line-height: 1.8em;
  font-size: 14px;
  line-height: 1.7em;
  color: #555;
  margin-bottom: 10px;
}

.foot p {
  padding: .5rem;
  font-size: 12px;
  color: #999;
  text-align: center;
}
</style>
