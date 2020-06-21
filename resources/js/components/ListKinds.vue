<template>
    <div class="table-container is-fullwidth">
        <table class="table is-fullwidth is-hoverable">
            <thead>
            <tr class="title is-6">
                <th>Name</th>
                <th>Description</th>
                <th id="spell_amount">SpellsAmount</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="kind in kinds" :key="kind.id">
                <td>
                    <a :href="'/kind/' + kind.slug" v-text="kind.name"/>
                </td>
                <td>{{kind.description}}</td>
                <td>{{kind.spells.length}}</td>
                <td>{{kind.created_at}}</td>
                <td>{{kind.updated_at}}</td>
                <td>
                    <a :href="'/kind/' + kind.slug + '/edit'" class="button is-info is-outlined is-small">Edit</a>
                </td>
                <td>
                    <button @click="deleteKind(kind)" class="button is-danger is-outlined is-small">Delete</button>
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
        name: "ListKinds",
        props: {
            kinds: {
                required: true
            }
        },
        methods: {
            deleteKind(kind) {
                kind = kind || this.kind;
                if(confirm('Are you sure?')){
                    console.log('deleting ' + kind.slug);
                    form.delete(`/kind/${kind.slug}`);
                    window.location.href = '/kind';
                }
            }
        }
    }
</script>

<style scoped>
    #spell_amount{
        width: 175px;
    }
td, th {
    padding: 6px;
    border: 1px solid #ccc;
    text-align: left;
}
</style>
