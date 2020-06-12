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
        'q': 'test',
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
                form: form,
                }
            },
        created() {
            this.postSpells("/search/spell");
        },
        methods: {
            postSpells(uri) {
                this.form.post(uri)
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
