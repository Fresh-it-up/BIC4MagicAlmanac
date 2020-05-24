<template>
    <header class="card-header">
        <h1 class="card-header-title">{{kind.name}}</h1>
    </header>
    <div class="card-content">
        <div class="content">
            <p>{{kind.slug}}</p>
            <br>
            <p>{{kind.description}}</p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "KindItem",
        props: ['kind']
    }
</script>

<style scoped>

</style>
