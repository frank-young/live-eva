<template>
    <div class="report-report">
            <div class="row">
                <div class="head">
                    <h1>{{report.name}}（报告）</h1>
                    <p>{{report.description}}</p>
                </div>
                <div class="body">
                  <h2>一、基础资料</h2>
                  <div class="module">
                    <p>姓名：{{report.customer.name}}</p>
                    <p>性别：{{sexArr[report.customer.sex]}}</p>
                    <p>出生日期：{{report.customer.birthday}}</p>
                    <p>监护人姓名：{{report.customer.guardian_name}}</p>
                    <p>孩子年龄：{{report.customer.age}}</p>
                    <p>关系：{{report.customer.relation}}</p>
                    <p>职业：{{report.customer.profession}}</p>
                    <p>联系地址：{{report.customer.address}}</p>
                    <p>联系电话：{{report.customer.mobile}}</p>
                  </div>
                  <h2>二、测评解读</h2>
                  <div class="module">
                      <h3>关于祥和家庭</h3>
                      <p>
                        祥和家庭的感觉统合测评标准依据儿童心理及智能运动的发展规律为基础，整合台湾奇德儿测评系统及“众望家学园”近10年的研究实践结果，让家长、老师、专业人员以科学的方式，对儿童感觉统合的发展有全面、深入的了解，让儿童在最强（0-6岁）最有效（0-12岁）的年龄段，提升天花板的高度、提升学习效率、弥补弱项，让优者更优。
                      </p>
                  </div>
                  <h2>
                    三、测评报告结果
                  </h2>
                  <div class="module">
                    <h3>图表对比</h3>
                    <div id="main" style="width: 100%;height:300px;"></div>
                  </div>
                  <div class="module" v-for="module in report.modules">
                      <h3>{{module.report.report_name}} 得分：<span>{{module.sum}}</span> 分</h3>
                      <div class="module-content" v-html="module.report.report_body"></div>
                  </div>

                  <h2>
                    四、综合建议
                  </h2>
                  <div class="module">
                    <h3>综合建议</h3>
                    <p>
                      您的孩子处在
                      {{Number(report.customer.age) <= 2 ? 0 : Number(report.customer.age) - 2}} - {{Number(report.customer.age) + 2}}
                       岁年龄段，为{{pregnancyArr[report.customer.pregnancy]}}产，经过测评，
                       感觉统合综合得分为
                       {{average}}
                       分，属于{{getAbnormalStatus}}。
                    </p>
                  </div>
                  <div class="module">
                    <h3>详细建议</h3>
                    <p>
                      <a class="btn-line" href="#">常规训练计划</a>
                    </p>
                    <p>
                      <a class="btn-line" href="#">庭教育智能运动包</a>
                    </p>
                    <p>
                      <a class="btn-line" href="#">感觉统合馆介绍</a>
                    </p>
                  </div>
                  <div class="module">
                    <h3>我们的祝福</h3>
                    <p>
                      感谢您智慧的家长，教育最大的成本不是金钱而是时间，孩子的成长是单行道，一旦错过了，花多少钱都无法弥补错失的遗憾。“不让孩子输在起跑线上”，真正的起跑线是家长的教育理念，只有家长好好学习，孩子才能天天向上！
                    </p>
                  </div>
                  <div class="module">
                    <p>
                      <a class="btn-line" onclick="window.history.go(-1)">返回重新测评</a>
                    </p>
                  </div>
                </div>

                <div class="foot">
                  <p>祥和家庭 &copy; 2017</p>
                  <p>由<a class="link" href="http://mobile.nanafly.com">呐呐科技</a>提供技术支持</p>
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
                sumArr: [],
                average: 0,
                sexArr: ['男', '女'],
                pregnancyArr: ['早产', '足月',' 自然产', '刨腹产']
            }
        },
        created() {
            this.default()
            this._getSumValue()
            this.getAverageValue()
            this.$nextTick(() => {
              this.chart()
            })
        },
        computed: {
          getAbnormalStatus () {
            if (this.average > 0 && this.average < 16) {
              return '正常'
            } else if (this.average >= 16 && this.average < 23) {
              return '轻度失调'
            } else if (this.average >= 23 && this.average < 28) {
              return '中度失调'
            } else if (this.average >= 28 && this.average < 32) {
              return '重度失调'
            } else {
              return '暂无'
            }
          }
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
            getAverageValue () {
              let sum = 0
              this.report.modules.forEach((v) => {
                sum += v.sum
              })
              this.average = Number(sum / this.report.modules.length).toFixed(2)
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

<style lang="less">
  .report-report {
    .head {
      position: relative;
      padding: .75rem 1rem;
      background-color: #3388cc;
      color: #fff;
    }
    .head h1 {
      padding: 0;
      margin: 0;
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
      padding: 0 1rem 1.5rem 1rem;
    }

    .body h2 {
      margin-bottom: .75rem;
      font-size: 18px;
      line-height: 1.6em;
      font-weight: 400;
      text-align: left;
    }

    .module {
      padding: 1.5rem 1rem;
      margin-bottom: 1.5rem;
      background-color: #fff;
      box-shadow: 3px 3px 12px #ddd;
      h3 {
         padding: 0 0 .5rem 0;
         margin-top: 0;
         margin-bottom: 1rem;
         font-size: 18px;
         text-align: left;
         color: #3388cc;
         border-bottom: 1px solid #3388cc;
         span {
           color: #f44;
         }
       }
       p {
         margin-bottom: .5rem;
         line-height: 1.8em;
         font-size: 16px;
         color: #555;
       }
       .module-content {
         h3 {
           padding: 0;
           line-height: 1.8em;
           font-size: 18px;
           color: #555;
           margin-bottom: .5rem;
           border: 0;
         }

       }
       .btn-line {
         display: block;
         padding: .5rem;
         margin-bottom: 1rem;
         color: #1AAD19;
         border: 1px solid #1AAD19;
         border-radius: 4px;
         text-decoration: none;
         font-size: 16px;
         text-align: center;
       }
    }

    .foot p {
      padding: 0;
      margin-bottom: .5rem;
      font-size: 12px;
      color: #999;
      text-align: center;
      .link {
        color: #3388cc;
        text-decoration: underline;
      }
    }
  }
</style>
