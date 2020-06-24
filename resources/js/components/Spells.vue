<template>
    <div class="container">
        <h1>Spells</h1>
        <div class="columns is-multiline">
            <div class="column is-10 is-offset-one-second">
                <div class="box custom-box" v-if="this.hasSpells">
                    <list-spells :spells="spells"></list-spells>
                </div>
                <p v-if="!this.hasSpells">No Spells found</p>
            </div>
        </div>
    </div>
</template>

<script>
    import ListSpells from "./ListSpells";
    let form = new Form({
        'name': '',
        'description': ''
    });
    export default {
        name: "Spells",
        components: {
            ListSpells
        },
        props: {
            spells: {
                required: true
            }
        },
        data() {
            return{
                hasSpells: function () {
                    return !!this.spells.length;
                },
            }
        },
    }
</script>

<style scoped>

</style>
