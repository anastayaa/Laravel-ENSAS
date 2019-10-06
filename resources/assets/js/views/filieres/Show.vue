<template>
    <div>
		<ul class="nav nav-tabs">
		    <li class="nav-item">
		      <router-link :to="{name: 'filiere'}" class="navbar-brand">Filiere</router-link>
		    </li>
		    <li class="nav-item">
		      <router-link :to="{name: 'filiere.create'}" class="navbar-brand">New Filiere</router-link>
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
                      <td>Departement</td>
                      <td>Responsable</td>
                      <td>Coordinateur</td>
			          <td colspan="2">Action</td>
			        </tr>
			    </thead>
			    <tbody>
                    <td>{{ filiere.id }}</td>
                    <td>{{ filiere.titre }}</td>
                    <td><img v-bind:src="filiere.image" class="img-responsive" height="70" width="90" alt="no Image"></td>
                    <td>{{ filiere.departement.titre }}</td>
                    <td>{{ filiere.responsable.nom }} {{ filiere.responsable.prenom }}</td>
                    <td>{{ filiere.coordinateur.nom }} {{ filiere.coordinateur.prenom }}</td>
                    <td>
                        <router-link :to="{name: 'filiere.show', params: {id: filiere.id}}" class="btn btn-primary">
                                Show
                        </router-link>
                        <router-link :to="{name: 'filiere.edit', params: {id: filiere.id}}" class="btn btn-primary">
                                Edit
                        </router-link>
                        <button class="btn btn-danger" v-on:click="deleteEntry(filiere.id)">
                                Delete
                        </button>
                    </td>
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
            axios.get('/api/filiere/' + id)
                .then(function (resp) {
                    app.filiere = resp.data;
                })
                .catch(function () {
                    console.log("Could not load your item")
                });
        },
        data: function () {
            return {
                filiere: {},
                result: ''
            }
        },
        methods: {
            deleteEntry(id){
                if (confirm("Do you really want to delete this filiere?")) {
                    var app = this;
                    axios.delete('/api/filiere/' + id)
                        .then(function (resp) {
                            app.result=resp.data;
                            console.log(resp.data);
                        })
                        .catch(function (resp) {
                        });
                }
            }
        }
    }
</script>

