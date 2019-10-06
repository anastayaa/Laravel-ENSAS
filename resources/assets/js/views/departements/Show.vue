<template>
    <div>
		<ul class="nav nav-tabs">
		    <li class="nav-item">
		      <router-link :to="{name: 'departement'}" class="navbar-brand">Departements</router-link>
		    </li>
		    <li class="nav-item">
		      <router-link :to="{name: 'departement.create'}" class="navbar-brand">New Departement</router-link>
		    </li>
		</ul>
        <div class="card uper">
            <div v-if="result" class="alert alert-success">
                {{ result }}  
            </div><br />
            <table class="table table-striped">
                <thead>
                    <tr>
                    <td>ID</td>
                    <td>Titre</td>
                    <td>Image</td>
                    <td colspan="2">Action</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ departement.id }}</td>
                        <td>{{ departement.titre }}</td>
                        <img v-bind:src="departement.image" class="img-responsive" height="70" width="90" alt="no Image">
                        <td>
                            <router-link :to="{name: 'departement.show', params: {id: departement.id}}" class="btn btn-primary">
                                    Show
                            </router-link>
                            <router-link :to="{name: 'departement.edit', params: {id: departement.id}}" class="btn btn-primary">
                                    Edit
                            </router-link>
                            <button class="btn btn-danger" v-on:click="deleteEntry(departement.id)">
                                    Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            axios.get('/api/departement/' + id)
                .then(function (resp) {
                    app.departement = resp.data;
                })
                .catch(function () {
                    console.log("Could not load your item")
                });
        },
        data: function () {
            return {
                departement: {
                    name: '',
                    image: ''
                },
                result: ''
            }
        },
        methods: {
            deleteEntry(id){
                if (confirm("Do you really want to delete this departement?")) {
                    var app = this;
                    axios.delete('/api/departement/' + id)
                        .then(function (resp) {
                            app.result=resp.data;
                            console.log(resp.data);
                            //app.$router.push('/departement');
                        })
                        .catch(function (resp) {
                        });
                }
            }
        }
    }
</script>

