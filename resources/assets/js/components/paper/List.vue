<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">问卷列表 <a href="paper/create" class="btn btn-info">添加问卷</a></div>

                    <div class="panel-body">
                        <div class="" v-for="d in data">
                            <a :href="'module/' + d.id">{{d.name}}</a>
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
            }
        }
    }
</script>
