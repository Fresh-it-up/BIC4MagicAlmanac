<template>
    <div class="container">
        <h1>Kinds</h1>
        <div class="columns is-multiline">
            <div class="column is-three-fifths is-offset-one-fifth">
                <div class="box custom-box" v-if="this.hasKinds">
                    <list-kinds :kinds="kinds"></list-kinds>
                </div>
                <p v-if="!this.hasKinds">No kinds found</p>
            </div>
        </div>
    </div>
</template>

<script>
    import ListKinds from "./ListKinds";
    let form = new Form({
        'name': '',
        'description': ''
    });
    export default {
        name: "Kinds",
        comments: {
            ListKinds
        },
        data() {
            return{
                hasKinds: function () {
                    return !!this.kinds.length;
                },
                kinds: [],
            }
        },
        created() {
            this.fetchKinds("/list/kind");
        },
        methods: {
            fetchKinds(uri){
                uri = uri || '/list/kind'
                console.log("fetching " + uri);
                fetch(uri)
                .then(res => res.json())
                .then(res => {
                    console.log("response: " + res);
                    this.kinds = res;
                })
                .catch(err => console.log(err));
            },
        }
    }
</script>

<style scoped>

</style>
