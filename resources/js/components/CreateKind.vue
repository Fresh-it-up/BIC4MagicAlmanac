<template>
    <div class="container">
        <div class="columns is-multiline">
            <div class="card blog-card column is-half is-offset-one-quarter">
                <header class="card-header">
                    <h1 class="card-header-title is-centered" v-text="edit ? form.name : 'New Kind'"/>
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
        'category_id': '',
        'name': '',
        'description': ''
    });
    export default {
        name: "CreateKind",
        props: {
            isEditable: {
                required: false,
                type: Boolean,
                default: false
            },
            currentKind: {
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
                this.url = '/kind/' + this.currentKind.slug;

                this.form.id = this.currentKind.id;
                this.form.name = this.currentKind.name;
                this.form.description = this.currentKind.description;

            } else {
                this.url = '/kind';
            }
            console.log('Current URl: ' + this.url);
        },
        methods: {
            submit() {
                console.log(this.edit ? 'editing' : 'creating');
                if (this.edit){
                    this.form.put(this.url);
                    window.location.href = '/kind';
                }
                else{
                    this.form.post(this.url)
                    .then(response => {
                        this.url = '/kind/' + response.slug;
                        console.log(response);
                        this.form.id = response.kind_id;
                        this.form.name = response.name;
                        this.form.description = response.description;

                        this.edit = true;

                        this.form.noReset = ['kind_id', 'name', 'description'];

                        window.history.pushState("", "", this.url);
                    });
                    window.location.href = '/kind';
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
