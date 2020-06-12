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
/*    let form = new Form({
        'name': '',
        'description': ''
    });*/
    let form = new Form({

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
            console.log("Before post");
            this.fetchSpells("/search/spell?q=Spell3");
            //this.postSpells("/search/spell?q=Spell3");
        },
        methods: {
            fetchSpells(uri){
                uri = uri || '/search/spell?q=Spell3'
                console.log("fetching " + uri);
                fetch(uri)
                    .then(res => {
                        console.log("SearchResponse: " + res);
                        this.spells = res;
                    })
                    .catch(err => console.log(err));
            },
            postSpells: function (uri) {
                console.log("Entering Post");

                this.form.post(uri)
                    .then(response => {
                        console.log(response[0].name);


                    })
            .catch(err => console.log(err));
            }
        }
    }
</script>

<style scoped>

</style>
