<template>
    <div class="container">
        <h1 class="h1">Edit Kind</h1>
        <form>
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
                <td><input class="button is-link" type="submit" value="Save Kind"></td>
            </table>
        </form>
    </div>
</template>

<script>
    import Hostname from "./Hostname";

    export default {
        name: "EditKind",
        props: ['kind'],
        created() {
            if(this.kind != null){
                this.slug = this.kind.slug;
                this.name = this.kind.name;
                this.description = this.kind.description;
            }
        },
        methods: {
            edit(e) {
                e.preventDefault();

                this.kind.slug = this.slug;
                this.kind.name = this.name;
                this.kind.description = this.description;
                var now = new Date();

                axios.put(Hostname.hostname+`/kind/${this.kind.id}`, {
                    slug: this.slug,
                    name: this.name,
                    description: this.description,
                    updated_at: now.toJSON()
                });
            }
        }
    }
</script>

<style scoped>

</style>
