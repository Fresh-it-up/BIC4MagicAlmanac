<template>
    <div class="table-container is-fullwidth">
        <table class="table is-fullwidth is-hoverable">
            <thead>
            <tr class="title is-6">
                <th>Name</th>
                <th>Quote</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Kindname</th>
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
                <td>
                   <a :href="'/kind/' + getKind(spell.kind_id).slug" :name="getKind(spell.kind_id).name" :description="getKind(spell.kind_id).description" v-text="getKind(spell.kind_id).name"/>
                </td>
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
        'quote': '',
        'kind_id': '',
        'description': ''
    });
    export default {
        name: "ListSpells",
        props: {
            spells: {
                required: true
            }
        },
        data() {
          return {
            kinds:[]
          }
        },
        created() {
          this.fetchKinds();
        },
        methods: {
            deleteSpell(spell) {
                spell = spell || this.spell;
                if(confirm('Are you sure?')){
                    console.log('deleting ' + spell.slug);
                    form.delete(`/spell/${spell.slug}`);
                    window.location.href = '/spell';
                }
            },
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
            getKind(kindID){
                if(this.kinds.length <= 0)
                    return kindID;
                let knd = this.kinds.filter(kind =>{
                    return parseInt(kind.id) === parseInt(kindID);
                });
                return knd[0];
            },
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
