<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">问卷列表</div>

                    <div class="panel-body">
                        <div class="" v-for="d in data">
                            {{d.module_name}}
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
