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
                                    <a class="btn-produce" href="#" @click="produce(d.id)">生成问卷</a>
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
            token: window.Laravel.csrfToken
          }
        },
        methods: {
            produce(id) {
                this.$http.get('paper/produce/' + id).then((res) => {
                    res = res.body
                    if (res.errno === ERR_OK) {
                        this.url = res.url
                        alert(this.url)
                    }
                })
            },
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
