<template>
    <div class="container">
        <div class="columns is-multiline is-centered">
            <div v-bind:key="spell.id" v-for="spell in spells">
                <div class="card column is-half is-offset-one-quarter">
                    <header class="card-header">
                        <h1 class="card-header-title">{{spell.name}}</h1>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            <p>Slug: {{spell.slug}}</p>
                            <br>
                            <p>{{spell.description}}</p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="card-footer-item">
                            <p>{{new Date(spell.created_at).toUTCString()}}</p>
                        </div>
                        <div class="card-footer-item">
                            <button class="button is-medium is-info">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Hostname from "./Hostname";
    import axios from 'axios';
    export default {
        name: 'Spells',
        comments: {

        },
        methods: {
        },
        created() {
            axios.get( Hostname.hostname + '/list/spell')
                .then(res => this.spells = res.data)
                .catch(err => console.log(err));

        },
        data() {
            return {
                spells: []
            }
        },
    }
</script>

<style scoped>
    .card{
        display: inline-block;
        margin: 25px;
        min-width: 550px;
    }
    .button{
        min-width: 150px;
    }
</style>
