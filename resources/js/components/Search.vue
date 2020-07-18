<template>
    <div class="container">
            <div class="field" >
                <label class="label" for="q">Suche</label>
                <div class="control">
                <input id="q"
                    v-model="form.q"
                    class="input"
                    type="text" @change="postSpells()">
                </div>
            </div>
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
        'q': ''
    });
    export default {
        name: "Search",
        components: {
            ListSpells
        },
        props: {
            incSpells: {
                required: true
            }
        },
        data() {
            return{
                hasSpells: function () {
                    return !!this.spells.length;
                },
                spells: [],
                form : form
            }
        },
        created() {
            this.spells = this.incSpells;
        },
        methods: {
            postSpells() {
                console.log("q " + this.form.q);
                form.post("/search/spell")
                .then(response => {
                    console.log(response);
                    this.spells = response;

                })
                .catch(err => console.log(err));
            }
        }
    }
</script>

<style scoped>

</style>
