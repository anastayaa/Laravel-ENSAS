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
			          <td colspan="2">Action</td>
			        </tr>
			    </thead>
			    <tbody>
			        <tr v-for="departement in departements.data" v-bind:key="departement.id">
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
              <pagination :data="departements" @pagination-change-page="getResults"></pagination>
		</div>
	</div>
</template>

<script>

    export default {
        data(){
            return{
                departements: {},
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
                    axios.delete('/api/departement/' + id)
                        .then(function (resp) {
                            app.departements.splice(app.departements.indexOf(id), 1);
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
                axios.get('/api/departement?page=' + page)
                    .then(function (resp) {
                        app.departements = resp.data;
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not load departemets");
                    });
                }
        }
    }
</script>