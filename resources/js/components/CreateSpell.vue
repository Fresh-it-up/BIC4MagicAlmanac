<template>
    <div class="container">
        <h1 class="h1">Create spell</h1>
        <form @submit="createSpell">
            <table class="table">
                <td>Slug</td>
                <td><input class="input" type="text" v-model="slug" placeholder="Enter Slug"></td>
                <tr></tr>
                <td>Name</td>
                <td><input class="input" type="text" v-model="name" placeholder="Enter Name"></td>
                <tr></tr>
                <td>Description</td>
                <td><input class="input" type="text" v-model="description" placeholder="Enter Description"></td>
                <tr></tr>
                <td></td>
                <td><input class="button is-link" type="submit" value="Create Spell"></td>
            </table>
        </form>
    </div>
</template>

<script>
    import Hostname from "./Hostname";

    export default {
        name: "CreateSpell",
        data(){
            return {
                slug: '',
                name: '',
                description: '',
                created_at: '',
                updated_at: ''
            }
        },
        methods: {
            createSpell(e){
                e.preventDefault();
                var now = new Date();
                const newSpell = {
                    slug: this.slug,
                    name: this.name,
                    description: this.description,
                    created_at: now.toJSON(),
                }

                const {slug, name, description, created_at, updated_at} = newSpell;
                axios.post(Hostname.hostname+'/spell',{
                    slug,
                    name,
                    description,
                    created_at,
                    updated_at
                })
                    .catch(err => console.log(err));

                this.slug = '';
                this.name = '';
                this.description = '';
            }
        }
    }
</script>

<style scoped>
    .h1{
        font-weight: bold;
        margin-bottom: 25px;
    }
</style>
