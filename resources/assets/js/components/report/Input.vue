<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
              <div class="panel panel-default">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col-md-8">
                        <p>报告</p>
                      </div>
                      <div class="col-md-4 text-right">
                        <a class="btn btn-info" @click="addReport">添加报告</a>
                      </div>
                    </div>
                  </div>
                  <div class="panel-body">
                    <div class="side-list-wrap">
                      <div class="side-list-item" v-for="report in reports">
                        <a href="#" @click="editReport(report.id)">{{report.report_name}} ----> {{report.min_score}}分至{{report.max_score}}分 </a>
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
                          <p>添加测评报告</p>
                        </div>
                      </div>
                    </div>
                    <div class="panel-body">
                      <form @submit.prevent="submit" class="form-horizontal">
                            <input type="hidden" name="_token" :value="token">
                            <input type="hidden" name="module_id" class="form-control" required="required" :value="id" >
                            <div class="form-group">
                                <label class="col-sm-2 control-label">标题</label>
                                <div class="col-sm-10">
                                    <input type="text" name="report_name" class="form-control" v-model="reportDefault.report_name" required="required" placeholder="请输入标题" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">最小分值</label>
                                <div class="col-sm-4">
                                  <input type="text" name="min_score" class="form-control" v-model="reportDefault.min_score" required="required" placeholder="最小分值（包括等于） "  >
                                </div>
                                <label class="col-sm-2 control-label">最大分值</label>
                                <div class="col-sm-4">
                                  <input type="text" name="max_score" class="form-control" v-model="reportDefault.max_score" required="required" placeholder="最大分值（包括等于） "  >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">内容</label>
                                <div class="col-sm-10">
                                    <textarea name="report_body" rows="10" class="form-control" v-model="reportDefault.report_body" placeholder="请输入内容"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2 text-right">
                                    <button class="btn btn-info">确认</button>
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
                            <p>编辑测评报告</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="panel-body">
                        <form @submit.prevent="submitEdit" class="form-horizontal">
                            <input type="hidden" name="_token" :value="token">
                            <input type="hidden" name="id" :value="reportEdit.id">
                            <input type="hidden" name="module_id" class="form-control" required="required" :value="id" >
                            <div class="form-group">
                                <label class="col-sm-2 control-label">标题</label>
                                <div class="col-sm-10">
                                    <input type="text" name="report_name" class="form-control" v-model="reportEdit.report_name" required="required" placeholder="请输入标题" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">最小分值</label>
                                <div class="col-sm-4">
                                  <input type="text" name="min_score" class="form-control" v-model="reportEdit.min_score" required="required" placeholder="最小分值（包括等于） "  >
                                </div>
                                <label class="col-sm-2 control-label">最大分值</label>
                                <div class="col-sm-4">
                                  <input type="text" name="max_score" class="form-control" v-model="reportEdit.max_score" required="required" placeholder="最大分值（包括等于） "  >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">内容</label>
                                <div class="col-sm-10">
                                    <textarea name="report_body" rows="10" class="form-control" v-model="reportEdit.report_body" placeholder="请输入内容"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2 text-right">
                                    <button class="btn btn-info">确认</button>
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
                token: window.Laravel.csrfToken,
                isAdd: true,
                reportDefault: {},
                reports: [],
                reportEdit: {}
            }
        },
        created() {
            this._getReportsTitleData()
        },
        methods: {
            submit(event) {
                // 提交
                let options = {}
                let formData = new FormData(event.target)

                options.headers = {'Content-Type': 'application/x-www-form-urlencoded'}
                options.emulateJSON = true

                this.$http.post('../report', formData, options).then((res) => {
                    res = res.body
                    if (res.errno === ERR_OK) {
                        this._getReportsTitleData()
                        this._reportDefault()
                    }
                })
            },
            submitEdit(event) {
                // 编辑提交
                let options = {}
                let formData = new FormData(event.target)

                options.headers = {'Content-Type': 'application/x-www-form-urlencoded'}
                options.emulateJSON = true

                this.$http.post('../report/update', formData, options).then((res) => {
                    res = res.body
                    if (res.errno === ERR_OK) {
                        this._getReportsTitleData()
                    }
                })
            },
            addReport() {
                // 添加报告，这里编辑和添加模块做了隐藏互换。
                this.isAdd = true
            },
            editReport(id) {
                // 编辑报告
                this.isAdd = false
                this._getReportData(id)
            },
            _getReportsTitleData() {
              // 获取报告标题列表数据
              this.$http.get('../report/list/' + this.id).then((res) => {
                  res = res.body
                  if (res.errno === ERR_OK) {
                      this.reports = res.reports
                  }
              })
            },
            _getReportData(id) {
              // 获取单个报告数据
              this.$http.get('../report/' + id + '/edit').then((res) => {
                  res = res.body
                  if (res.errno === ERR_OK) {
                      this.reportEdit = res.report
                  }
              })
            },
            _reportDefault() {
                // 初始化默认表单数据
                this.reportDefault = {
                    report_name: '',
                    report_body: '',
                    min_score: null,
                    max_score: null
                }
            }
        }
    }
</script>
<style media="screen" lang="less">

</style>
