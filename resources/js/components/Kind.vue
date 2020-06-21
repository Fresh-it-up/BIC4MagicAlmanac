<template>
    <div class="container">
        <div class="columns is-multiline">
            <div class="card blog-card column is-half is-offset-one-quarter">
                <header class="card-header">
                    <h1 class="card-header-title is-centered" v-text="this.oneKind.name"/>
                </header>
                <div class="card-content">
                    <div class="content">
                        <form>
                            <div class="field">
                                <label class="label" >Description</label>
                                <p>{{this.oneKind.description}}</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Kind",
        props: {
            oneKind: {
                required: true
            },
            spells: []
        },
        created() {
            console.log(this.spells);
        }
    }
</script>

<style scoped>

</style>
