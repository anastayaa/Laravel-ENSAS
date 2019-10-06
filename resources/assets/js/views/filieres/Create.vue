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
        <div class="card-body">
            <div v-if="validationErrors" class="alert alert-danger">
                <ul>
                    <li v-for="value in validationErrors" v-bind:key="value">{{ value }}</li>
                </ul>
            </div>
            <br />
            <div v-if="result" class="alert alert-success">
                {{ result }}  
            </div><br />
            <form v-on:submit="saveForm()" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="titre">Titre:</label>
                    <input type="text" v-model="filiere.titre" class="form-control">
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <img :src="image" class="img-responsive" height="70" width="90">
                    <input type="file" v-on:change="onImageChange" class="form-control">
                </div>
                <div class="form-group">
                    <label for="departement_id">Deparetement:</label>
                    <select class="form-control" name="departement_id" v-model="filiere.departement_id">
                        <option v-for="departement in departements" v-bind:value="departement.id" v-bind:key="departement.id">{{ departement.titre }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="responsable_id">Responsable:</label>
                    <select class="form-control" name="responsable_id" v-model="filiere.responsable_id">
                        <option v-for="responsable in responsables" v-bind:value="responsable.id" v-bind:key="responsable.id">{{ responsable.nom }} {{ responsable.prenom }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="coordinateur_id">Coordinateur:</label>
                    <select class="form-control" name="coordinateur_id" v-model="filiere.coordinateur_id">
                        <option v-for="coordinateur in coordinateurs" v-bind:value="coordinateur.id" v-bind:key="coordinateur.id">{{ coordinateur.nom }} {{ coordinateur.prenom }}</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>
</template>

<script>
	export default {
        mounted() {
            let app = this;
            axios.get('/api/departement?all=1')
                .then(function (resp) {
                    app.departements = resp.data;
                })
                .catch(function () {
                    console.log("Could not load the departement")
                });
            axios.get('/api/responsable?all=1')
                .then(function (resp) {
                    app.responsables = resp.data;
                })
                .catch(function () {
                    console.log("Could not load the departement")
                });
            axios.get('/api/coordinateur?all=1')
                .then(function (resp) {
                    app.coordinateurs = resp.data;
                })
                .catch(function () {
                    console.log("Could not load the departement")
                });
        },
        data: function () {
            return {
                filiere: {
                    titre: '',
                    image: '',
                    departement_id: '',
                    responsable_id: '',
                    coordinateur_id: ''
                },
                departements: '',
                responsables: '',
                coordinateurs: '',
                image: '',
                result: '',
                validationErrors: ''
            }
        },
        methods: {
        	onImageChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
                this.filiere.image=e.target.files[0];
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
        	saveForm() {
        		event.preventDefault();
                var app = this;
                var newItem = app.filiere;

                let formData = new FormData();
                formData.append('titre', newItem.titre);
                formData.append('image', newItem.image);
                formData.append('departement_id', newItem.departement_id);
                formData.append('responsable_id', newItem.responsable_id);
                formData.append('coordinateur_id', newItem.coordinateur_id);

                axios.post('/api/filiere', formData)
                    .then(function (resp) {
                    	app.result=resp.data.message;
                        console.log('ok '+resp.data.message);
                    })
                    .catch(error => {
                    	if (error.response.status == 422){
					       this.validationErrors = error.response.data.errors;
					       console.log(error.response.data.message);
					    }
                    });
        	}
        }
    }

</script>