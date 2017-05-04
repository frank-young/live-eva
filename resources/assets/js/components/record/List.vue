<template>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-md-8">
                    <p>用户答卷</p>
                  </div>
                  <div class="col-md-4 text-right">
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table">
                  <thead>
                    <tr>
                      <!-- <th>问卷名称</th> -->
                      <th>用户姓名</th>
                      <th>填写时间</th>
                      <th>操作</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="d in data">
                      <!-- <td>{{d.report}}</td> -->
                      <td>{{d.name}}</td>
                      <td>{{d.created_at}}</td>
                      <td>
                        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detailModal" @click="showDetail(d.record)">问卷详情</a>
                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#reportModal" @click="produceReport(d.report)">生成报告</a>
                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#baseinfoModal" @click="baseinfoReport(d)">基础资料</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>

      <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="detailModalLabel">{{paperName}}</h4>
            </div>
            <div class="modal-body">
              <div class="detail-box" v-for="(det,i) in detail">
                <h3>{{det.question_name}}</h3>
                <p>{{det.answer_name}} --> {{det.score}}分</p>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
              <button type="button" class="btn btn-primary">保存</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="reportModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="reportModalLabel">{{paperName}}（测评报告）</h4>
            </div>
            <div class="modal-body">
              <div class="module detail-box" v-for="module in report.modules">
                  <h3>{{module.report.report_name}}</h3>
                  <div class="" v-html="module.report.report_body"></div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
              <button type="button" class="btn btn-primary">保存</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="baseinfoModal" tabindex="-1" role="dialog" aria-labelledby="baseinfoModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="baseinfoModalLabel">基础资料</h4>
            </div>
            <div class="modal-body">
              <base-info :data="customer"></base-info>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
              <button type="button" class="btn btn-primary">保存</button>
            </div>
          </div>
        </div>
      </div>

    </div>
</template>

<script>
    export default {
        props: {
            data: {
                type: Array
            }
        },
        data () {
          return {
            paperName: '',
            detail: [],
            report: {},
            customer: {}
          }
        },
        created () {
          console.log(this.data)
        },
        methods: {
          showDetail (value) {
            this.detail = value
            this.paperName = value[0].paper_name
            // console.log(this.detail[0].paper_name)
          },
          produceReport (value) {
            this.detail = value
            this.paperName = value.paper_name
            this.report = JSON.parse(value.report_json)
            // console.log(this.report)
          },
          baseinfoReport (value) {
            this.customer = value
            console.log(this.customer)
          }
        }
    }
</script>

<style scoped>
  .detail-box {
    margin: 15px 30px;
    padding-bottom: 10px;
    border-bottom: 1px solid #ddd;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
  }
  .detail-box:last-of-type {
    border-bottom: 0;
  }
  .detail-box h3 {
    margin-bottom: 8px;
    font-size: 18px;
  }
  .detail-box p {
    padding-left: 30px;
    font-size: 16px;
  }

</style>
