<template>
    <div>
        <Kinder v-bind:kinder="kinder"/>

    </div>
</template>

<script>
    import Kinder from './kinderList'

    export default {

        name: "kinderIndex",
        components: {
            Kinder
        },
        data() {
            return {
                kinder: [
                    {
                        id: 1,
                        title: "puper 1"
                    },
                    {
                        id: 2,
                        title: "suepr 2"
                    }
                ]
            }
        }
    }



</script>

<style scoped>

</style>
