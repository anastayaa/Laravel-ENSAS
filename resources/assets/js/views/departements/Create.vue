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
                    <input type="text" v-model="departement.titre" class="form-control">
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <img :src="image" class="img-responsive" height="70" width="90">
                    <input type="file" v-on:change="onImageChange" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>
</template>

<script>
	export default {
        data: function () {
            return {
                departement: {
                    titre: '',
                    image: ''
                },
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
                this.departement.image=e.target.files[0];
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
                var newItem = app.departement;

                let formData = new FormData();
                formData.append('titre', newItem.titre);
                formData.append('image', newItem.image);

                axios.post('/api/departement', formData)
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