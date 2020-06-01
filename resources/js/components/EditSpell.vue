<template>
    <div class="container">
        <h1 class="h1">Edit Spell</h1>
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
                <td><input class="button is-link" type="submit" value="Save Spell"></td>
            </table>
        </form>
    </div>
</template>

<script>
    import Hostname from "./Hostname";

    export default {
        name: "EditSpell",
        props: ['spell'],
        created() {
            if(this.spell != null){
                this.slug = this.spell.slug;
                this.name = this.spell.name;
                this.description = this.spell.description;
            }
        },
        methods: {
            edit(e) {
                e.preventDefault();

                this.spell.slug = this.slug;
                this.spell.name = this.name;
                this.spell.description = this.description;
                var now = new Date();

                axios.put(Hostname.hostname+`/spell/${this.spell.id}`, {
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
