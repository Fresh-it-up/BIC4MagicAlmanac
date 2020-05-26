<template>
    <div>
        <h1>Kind of</h1>
        <div v-for="kind in Kinder">
            <label>{{Kind.id}}</label>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {

                Kinder: [{id: 1}, {id: 2}]

            }
        }
    }
</script>

<style scoped>

</style>
