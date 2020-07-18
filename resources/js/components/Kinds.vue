<template>
    <div class="container">
        <h1>Kinds</h1>
        <div class="columns is-multiline">
            <div class="column is-25 is-offset-one-second">
                <div class="box custom-box" v-if="this.hasKinds">
                    <list-kinds :kinds="kinds"></list-kinds>
                </div>
                <p v-if="!this.hasKinds">No kinds found</p>
            </div>
        </div>
    </div>
</template>

<script>
    let form = new Form({
        'name': '',
        'description': '',
    });
    export default {
        name: "Kinds",
        props: {
            kinds: {
                required: true
            }
        },
        data() {
            return {
                hasKinds: function () {
                    return !!this.kinds.length;
                },
            }
        },
    }
</script>

<style scoped>

</style>
