<template>
    <div class="container">
        <h1 class="h1">Create kind</h1>
        <form @submit="createKind">
            <table class="table">
                <td>Name</td>
                <td><input class="input" type="text" v-model="name" placeholder="Enter Name"></td>
                <tr></tr>
                <td>Description</td>
                <td><input class="input" type="text" v-model="description" placeholder="Enter Description"></td>
                <tr></tr>
                <td></td>
                <td><input class="button is-link" type="submit" value="Create Kind"></td>
            </table>
        </form>
    </div>
</template>

<script>
    export default {
        name: "CreateKind",
        data() {
            return {
                name: '',
                description: '',
            }
        },
        methods: {
            createKind(e){

                console.log('Creating Kind')
                this.form = new Form({
                    'name': this.name,
                    'description': this.description})
                this.form.post('/kind');

                e.preventDefault();

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
