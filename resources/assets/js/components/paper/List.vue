<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">问卷列表 <a href="paper/create" class="btn btn-info">添加问卷</a></div>

                    <div class="panel-body">
                        <div class="" v-for="d in data">
                            <a :href="'paper/' + d.id">{{d.name}}</a> |
                            <a href="#" @click="produce(d.id)">生成问卷</a>
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
        methods: {
            produce(id) {
                this.$http.get('paper/produce/' + id).then((res) => {
                    res = res.body
                    if (res.errno === ERR_OK) {
                        this.url = res.url
                        alert(this.url)
                    }
                })
            }
        }
    }
</script>
