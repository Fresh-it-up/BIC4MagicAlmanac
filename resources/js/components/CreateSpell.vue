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
                                           v-bind:class="{ 'is-danger': form.errors.has('quote')}"
                                           type="text" autofocus>
                                </div>
                                <p class="help is-danger" v-if="form.errors.has('quote')"
                                   v-text="form.errors.get('name')"/>
                            </div>

                            <div class="field" >
                                <label class="label" for="dropdown-menu">Kind</label>
                                <div class="dropdown is-right box" v-bind:class="{ 'is-active': isDropdownActive }">
                                    <div class="dropdown-trigger" @click="isDropdownActive=!isDropdownActive" >
                                        <a aria-haspopup="true" aria-controls="{ 'dropdown-menu'}">
                                            <span id="selectedOne">{{this.selectedKind == null ? "Select Kind" : this.selectedKind.name }}</span>
                                            <span class="icon is-small">
                                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="dropdown-menu" id="dropdown-menu" role="menu">
                                        <div class="dropdown-content" ref="dropdownContent">
                                            <div v-for="kind in kinds" :key="kind.id">
                                                      <a href="#" class="dropdown-item " @click="dropDownOnChange(kind.id, kind.name)">
                                                           {{kind.name}}
                                                      </a>
                                             </div>
                                        </div>
                                    </div>
                                </div>
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
            }
        },
        data() {
            return {
                edit: undefined,
                form: form,
                url: '',
                selectedKind:'',
                kinds:[],
                isDropdownActive: false,
            }
        },
        created() {
            this.edit = this.isEditable;
            
            this.fetchKinds();

            console.log('Current URl: ' + this.url);
            if (this.edit) {
                this.url = '/spell/' + this.currentSpell.slug;
                this.form.id = this.currentSpell.id;
                this.form.name = this.currentSpell.name;
                this.form.kind_id = this.currentSpell.kind_id;
                this.form.quote = this.currentSpell.quote;
                this.form.description = this.currentSpell.description;
            } else {
                this.url = '/spell';
                this.selectedKind = null;
            }

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
                            this.form.id = response.id;
                            this.form.name = response.name;
                            this.form.kind_id = response.kind_id;
                            this.form.quote = response.quote;
                            this.form.description = response.description;
                            this.edit = true;
                            this.form.noReset = ['id', 'name', 'description', 'kind_id', 'quote'];
                            window.history.pushState("", "", this.url);
                        });
                    window.location.href = '/spell';
                }
            },
            dropDownOnChange(kindID, kindName) {
                this.form.kind_id = kindID;
                document.getElementById("selectedOne").innerText = kindName;
            },
            fetchKinds(uri){
                uri = uri || '/list/kind'
                console.log("fetching " + uri);
                fetch(uri)
                    .then(res => res.json())
                    .then(res => {
                        console.log("response: " + res);
                        this.kinds = res;
                        if(this.edit){
                            this.setKindname();
                        }
                    })

                    .catch(err => console.log(err));
            },
            setKindname(){
                let knd = this.kinds.filter(kind =>{
                    return parseInt(kind.id) === parseInt(this.currentSpell.kind_id);
                });
                this.selectedKind = knd[0];
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
