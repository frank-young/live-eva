<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                      <div class="row">
                        <div class="col-md-8">
                          <p>问卷</p>
                        </div>
                        <div class="col-md-4 text-right">
                          <a href="paper/create" class="btn btn-info">添加问卷</a>
                        </div>
                      </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-6 col-md-4" v-for="d in data">
                                <div class="list-box ">
                                  <h3><a :href="'paper/edit/' + d.id">{{d.name}}</a></h3>
                                  <div class="line-box">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                  </div>
                                  <p class="btn-group">
                                    <a class="btn-edit" :href="'paper/' + d.id">类目管理</a>
                                    <a class="btn-produce" href="#" @click="produce(d.id)" data-toggle="modal" data-target="#reportModal">生成问卷</a>
                                  </p>
                                  <!-- <div class="delete">
                                    <form @submit.prevent="deleteFunc(d.id)">
                                        <input type="hidden" name="_token" :value="token">
                                        <input type="hidden" name="_method" value="delete">
                                        <button class="btn btn-delete">删除</button>
                                    </form>
                                  </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="reportModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="reportModalLabel">生成问卷分享链接</h4>
              </div>
              <div class="modal-body">
                <div class="input-group">
                  <input type="text" class="form-control" :value="url">
                  <span class="input-group-btn">
                    <button  class="btn btn-default" type="button">复制链接</button>
                  </span>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary">确认</button>
              </div>
            </div>
          </div>
        </div>
    </div>
</template>

<script>
const ERR_OK = 0;
export default {
    props: {
        data: {
            type: Array
        }
    },
    data () {
      return {
        url: '',
        token: window.Laravel.csrfToken
      }
    },
    methods: {
        produce (id) {
            this.$http.get('paper/produce/' + id).then((res) => {
                res = res.body
                if (res.errno === ERR_OK) {
                    this.url = res.url
                }
            })
        }
        // deleteFunc(id) {
        //   let options = {}
        //   let formData = new FormData(event.target)
        //   options.headers = {'Content-Type': 'application/x-www-form-urlencoded'}
        //   options.emulateJSON = true
        //
        //     this.$http.post('paper/' + id, formData, options).then((res) => {
        //         res = res.body
        //         if (res.errno === ERR_OK) {
        //         }
        //     })
        // }
    }
}
</script>
