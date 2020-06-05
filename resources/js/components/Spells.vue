<template>
    <div class="container">
        <h1>Spells</h1>
        <div class="columns is-multiline">
            <div class="column is-three-fifths is-offset-one-fifth">
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
        comments: {
            ListSpells
        },
        data() {
            return{
                hasSpells: function () {
                    return !!this.spells.length;
                },
                spells: [],
            }
        },
        created() {
            this.fetchSpells("/list/spell");
        },
        methods: {
            fetchSpells(uri){
                uri = uri || '/list/spell'
                console.log("fetching " + uri);
                fetch(uri)
                    .then(res => res.json())
                    .then(res => {
                        console.log("response: " + res);
                        this.spells = res;
                    })
                    .catch(err => console.log(err));
            },
        }
    }
</script>

<style scoped>

</style>
