<template>
    <div class="container">
    <form @submit.prevent="createKind">
        <div class="container is-fluid">
            <p>Name: </p>
            <label title="Name">
                <input type="text" class="" placeholder="name" v-model="kind.name">
            </label>
        </div>
        <div class="container">
            <p>Description: </p>
            <label title="Description">
                <input type="text" class="" placeholder="description" v-model="kind.description">
            </label>
        </div>
        <div class="container">
            <button type="submit" class="button is-success">{{this.edit ? 'Save' : 'Create'}}</button>
        </div>
    </form>
        <div class="columns is-multiline is-centered">
            <div v-bind:key="kind.id" v-for="kind in kinds">
                <div class="column is-flex is-full is-offset-one-third">
                    <div class="card">
                        <header class="card-header">
                            <h1 class="card-header-title">{{kind.name}}</h1>
                        </header>
                        <div class="card-content">
                            <div class="content is-large">
                                <p >Slug:{{kind.slug}}</p>
                                <br>
                                <p>{{kind.description}}</p>
                            </div>
                        </div>
                        <div class="card-footer">
                                <div class="card-footer-item">
                                    <p>{{new Date(kind.created_at).toUTCString()}}</p>
                                </div>
                            <div class="card-footer-item">
                                <div class="buttons ">
                                    <button @click="editKind(kind)" class="button is-warning">Edit</button>
                                    <button @click="deleteKind(kind)" class="button is-danger">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    let form = new Form({
        'name': '',
        'description': ''
    });
    //test
    export default {
        name: "KindItem",
        data() {
            return{
                kinds: [],
                kind: {
                    id: '',
                    slug: '',
                    name: '',
                    description: '',
                },
                pagination: {},
                edit: false,
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
            createKind() {
                if(!this.edit) {
                    console.log('Creating Kind')
                    this.form = new Form({
                        'name': this.kind.name,
                        'description': this.kind.description})
                    this.form.post('/kind');
                } else {
                    console.log("Edit kind " + this.kind.slug);
                    this.form = new Form({
                        'name': this.kind.name,
                        'description': this.kind.description})
                    this.form.put(`/kind/${this.kind.slug}`);
                }
                this.fetchKinds();
            },
            editKind(kind) {
                this.edit = true;
                this.kind.slug = kind.slug;
                this.kind.name = kind.name;
                this.kind.description = kind.description;
            },
            deleteKind(kind) {
                if(confirm('Are you sure?')){
                    console.log('deleting ' + kind.slug);
                    form.delete(`/kind/${kind.slug}`);
                    this.fetchKinds();
                }
            }
        }
    }
</script>

<style scoped>

</style>
