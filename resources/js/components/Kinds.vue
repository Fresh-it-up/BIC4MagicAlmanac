<template>
    <div class="container">
        <div class="columns is-multiline is-centered">
            <div v-bind:key="kind.id" v-for="kind in kinds">
                <div class="card column is-half is-offset-one-quarter">
                    <header class="card-header">
                        <h1 class="card-header-title">{{kind.name}}</h1>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            <p>Slug: {{kind.slug}}</p>
                            <br>
                            <p>{{kind.description}}</p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="card-footer-item">
                            <p>{{new Date(kind.created_at).toUTCString()}}</p>
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
        name: 'Kinds',
        comments: {

        },
        methods: {
        },
        created() {
            axios.get( Hostname.hostname + '/list/kind')
                .then(res => this.kinds = res.data)
                .catch(err => console.log(err));

        },
        data() {
            return {
               kinds: []
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
