<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                      <div class="row">
                        <div class="col-md-8">
                          <p>类目</p>
                        </div>
                        <div class="col-md-4 text-right">
                          <a :href="'../module/create?id=' + id " class="btn btn-info">添加类目</a>
                        </div>
                      </div>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-6 col-md-4" v-for="d in data">
                                <div class="list-box">
                                  <h3><a :href="'../module/' + d.id">{{d.module_name}}</a></h3>
                                  <div class="line-box">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                  </div>
                                  <p class="btn-group">
                                    <a class="btn-edit" :href="'../module/' + d.id">添加问题</a>
                                    <a class="btn-produce" :href="'../report/' + d.id">测评报告</a>
                                  </p>
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
    export default {
        props: {
            data: {
                type: Array
            },
            id: {
                type: Number
            }
        }
    }
</script>
