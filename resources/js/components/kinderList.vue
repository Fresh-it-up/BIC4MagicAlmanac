<template>
    <div>
        <h1>Kinder</h1>
        <div v-for="kind in kinder">
           <kinderItem v-bind:kind="kind" />
        </div>
    </div>
</template>

<script>
    import kinderItem from './kinderItem'
    export default {
        name: "Kinder",
        components: {
            kinderItem
        },
        props: ["kinder"]
    }
</script>

<style scoped>

</style>
