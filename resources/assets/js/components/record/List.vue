<template>
    <div class="container">
        <div class="row">

        </div>
    </div>
</template>

<script>
    export default {
        props: {
            data: {
                type: Array
            }
        },
        created () {
          console.log(this.data)
        }
    }
</script>
