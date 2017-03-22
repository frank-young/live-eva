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
                                  <h3><a :href="'paper/' + d.id">{{d.name}}</a></h3>
                                  <div class="line-box">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                  </div>
                                  <p class="btn-group">
                                    <a class="btn-edit" :href="'paper/' + d.id">添加类目</a>
                                    <a class="btn-produce" href="#" @click="produce(d.id)">生成问卷</a>
                                  </p>
                                  <div class="delete">
                                    <form @submit.prevent="deleteFunc(comment.id)">
                                        <input type="hidden" name="_token" :value="token">
                                        <button class="btn">删除</button>
                                    </form>
                                  </div>
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
          token: window.Laravel.csrfToken
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
            deleteFunc(id) {
                this.$http.get('paper/produce/' + id).then((res) => {
                    res = res.body
                    if (res.errno === ERR_OK) {
                    }
                })
            },
        }
    }
</script>
