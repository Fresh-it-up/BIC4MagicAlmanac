<template>
    <div class="table-container is-fullwidth">
        <table class="table is-fullwidth is-hoverable">
            <thead>
            <tr class="title is-6">
                <th>Name</th>
                <th>Quote</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Kind-IDs</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="spell in spells" :key="spell.id">
                <td>
                    <a :href="'/spell/' + spell.slug"
                       :name="spell.name" :description="spell.description" v-text="spell.name"/>
                </td>
                <td>{{spell.quote}}</td>
                <td>{{spell.created_at}}</td>
                <td>{{spell.updated_at}}</td>
                <td>{{spell.kind_id}}</td>
                <td>
                    <a :href="'/spell/' + spell.slug + '/edit'" class="button is-info is-outlined is-small">Edit</a>
                </td>
                <td>
                    <button @click="deleteSpell(spell)" class="button is-danger is-outlined is-small">Delete</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    let form = new Form({
        'name': '',
        'description': ''
    });
    export default {
        name: "ListSpells",
        props: {
            spells: {
                required: true
            }
        },
        methods: {
            deleteSpell(spell) {
                spell = spell || this.spell;
                if(confirm('Are you sure?')){
                    console.log('deleting ' + spell.slug);
                    form.delete(`/spell/${spell.slug}`);
                }
            }
        }
    }
</script>

<style scoped>
    td, th {
        padding: 6px;
        border: 1px solid #ccc;
        text-align: left;
    }
</style>
