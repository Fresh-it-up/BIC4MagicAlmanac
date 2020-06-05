<template>
    <div class="container">
        <div class="columns is-multiline">
            <div class="card blog-card column is-half is-offset-one-quarter">
                <header class="card-header">
                    <h1 class="card-header-title is-centered" v-text="edit ? form.name : 'New Spell'"/>
                </header>
                <div class="card-content">
                    <div class="content">
                        <form @submit.prevent="submit">
                            <div class="field" >
                                <label class="label" for="name">Name</label>
                                <div class="control">
                                    <input id="name"
                                           v-model="form.name"
                                           class="input"
                                           v-bind:class="{ 'is-danger': form.errors.has('name')}"
                                           type="text" autofocus>
                                </div>
                                <p class="help is-danger" v-if="form.errors.has('name')"
                                   v-text="form.errors.get('name')"/>
                            </div>
                            <div class="field" >
                                <label class="label" for="quote">Quote</label>
                                <div class="control">
                                    <input id="quote"
                                           v-model="form.quote"
                                           class="input"
                                           v-bind:class="{ 'is-danger': form.errors.has('name')}"
                                           type="text" autofocus>
                                </div>
                                <p class="help is-danger" v-if="form.errors.has('name')"
                                   v-text="form.errors.get('name')"/>
                            </div>

                            <div class="field" >
                                <label class="label" for="kind_id">Kind ID</label>
                                <div class="control">
                                    <input id="kind_id"
                                           v-model="form.kind_id"
                                           class="input"
                                           v-bind:class="{ 'is-danger': form.errors.has('name')}"
                                           type="text" autofocus>
                                </div>
                                <p class="help is-danger" v-if="form.errors.has('name')"
                                   v-text="form.errors.get('name')"/>
                            </div>

                            <div class="field">
                                <label class="label" for="description">Description</label>
                                <div class="control">
                                    <textarea id="description" v-model="form.description" class="textarea"></textarea>
                                </div>
                                <p class="help is-danger" v-if="form.errors.has('description')"
                                   v-text="form.errors.get('description')"/>
                            </div>
                            <button type="submit" class="button is-large is-primary is-outlined is-fullwidth" v-text="edit ? 'Update' : 'Save'" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    let form = new Form({
        'id': '',
        'name': '',
        'quote': '',
        'kind_id': '',
        'description': ''
    });
    export default {
        name: "CreateSpell",
        props: {
            isEditable: {
                required: false,
                type: Boolean,
                default: false
            },
            currentSpell: {
                required: false,
                type: Object
            },
        },
        data() {
            return {
                edit: undefined,
                form: form,
                url: ''
            }
        },
        created() {
            this.edit = this.isEditable;
            if (this.edit) {
                this.url = '/spell/' + this.currentSpell.slug;

                this.form.spell_id = this.currentSpell.id;
                this.form.name = this.currentSpell.name;
                this.form.kind_id = this.currentSpell.kind_id;
                this.form.quote = this.currentSpell.quote;
                this.form.description = this.currentSpell.description;

            } else {
                this.url = '/spell';
            }
            console.log('Current URl: ' + this.url);
        },
        methods: {
            submit() {
                console.log(this.edit ? 'editing' : 'creating');
                if (this.edit){
                    this.form.put(this.url);
                    window.location.href = '/spell';
                }
                else{
                    this.form.post(this.url)
                        .then(response => {
                            this.url = '/spell/' + response.slug;
                            console.log(response);
                            this.form.spell_id = response.spell_id;
                            this.form.name = response.name;
                            this.form.kind_id = response.kind_id;
                            this.form.quote = response.quote;
                            this.form.description = response.description;

                            this.edit = true;

                            this.form.noReset = ['spell_id', 'name', 'description'];

                            window.history.pushState("", "", this.url);
                        });
                    window.location.href = '/spell';
                }
            },
        }
    }
</script>

<style scoped>
    .h1{
        font-weight: bold;
        margin-bottom: 25px;
    }
</style>
