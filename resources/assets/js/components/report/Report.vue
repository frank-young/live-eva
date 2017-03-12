<template>
    <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <h1>{{report.name}}</h1>
                </div>
                <div class="col-md-8 col-md-offset-2">
                    <div class="" v-for="module in report.modules">
                        <h2>{{module.report.report_name}}</h2>
                        <p>{{module.report.report_body}}</p>
                    </div>
                </div>
            </div>
    </div>
</template>

<script>
    const ERR_OK = 0
    export default {
        data() {
            return {
                report: {}
            }
        },
        created() {
            this.default()
        },
        methods: {
            default() {
                this.report = window.localStorage.getItem('report') ? JSON.parse(window.localStorage.getItem('report')) : {}
            }
        }
    }
</script>
