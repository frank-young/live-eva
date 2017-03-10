<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">类目列表</div>

                    <div class="panel-body">
                        <div class="" v-for="d in data">
                            <a :href="'../module/' + d.id">{{d.module_name}}</a> | 
                            <a href="#" class="">测评报告</a>
                        </div>
                        <div class="">
                            <a :href="'../module/create?id=' + id " class="btn btn-info">添加类目</a>
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
