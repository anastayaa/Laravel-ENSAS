<template>
	<div>
		<ul class="nav nav-tabs">
		    <li class="nav-item">
		      <router-link :to="{name: 'filiere'}" class="navbar-brand">Filieres</router-link>
		    </li>
		    <li class="nav-item">
		      <router-link :to="{name: 'filiere.create'}" class="navbar-brand">New Filiere</router-link>
		    </li>
		</ul>
		<div class="uper">
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
			        <tr v-for="filiere in filieres.data" v-bind:key="filiere.id">
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
                    </tr>
			    </tbody>
			  </table>
              <pagination :data="filieres" @pagination-change-page="getResults"></pagination>
		</div>
	</div>
</template>

<script>

    export default {
        data(){
            return{
                filieres: {},
                result: ''
            }
        },
        created() {
            this.getResults();
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            deleteEntry(id){
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/filiere/' + id)
                        .then(function (resp) {
                            app.filieres.splice(app.filieres.indexOf(id), 1);
                            app.result=resp.data;
                        })
                        .catch(function (resp) {
                        });
                }
            },
            getResults(page){
                var app = this;
                if (typeof page === 'undefined') {
                    page = 1;
                }
                axios.get('/api/filiere?page=' + page)
                    .then(function (resp) {
                        app.filieres = resp.data;
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not load departemets");
                    });
                }
        }
    }
</script>