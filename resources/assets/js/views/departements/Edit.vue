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
            <form v-on:submit="updateForm()" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="titre">Titre:</label>
                    <input type="text" v-model="departement.titre" class="form-control">
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <img :src="image" class="img-responsive" height="70" width="90">
                    <input type="file" v-on:change="onImageChange" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.departementId = id;
            axios.get('/api/departement/' + id)
                .then(function (resp) {
                    app.departement = resp.data;
                })
                .catch(function () {
                    console.log("Could not load the departement")
                });
        },
        data: function () {
            return {
                departementId: null,
                departement: {
                    titre: '',
                    image: ''
                },
                validationErrors: '',
                result: '',
                image: '',
                fileImage: ''
            }
        },
        methods: {
            onImageChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
                this.fileImage=e.target.files[0];
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            updateForm() {
                event.preventDefault();
                var app = this;
                var newItem = app.departement;

                let formData = new FormData();
                formData.append('titre', newItem.titre);
                formData.append('image', app.fileImage);
                console.log(formData.titre+' '+formData.image);
                axios.put('/api/departement/' + app.departementId, formData)
                    .then(function (resp) {
                        app.result=resp.data.message;
                        console.log(resp.data.message);
                    })
                    .catch(function (resp) {
                        app.validationErrors = error.response.data.errors;
                        console.log('erreur '+resp);
                    });
            }
        }
    }
</script>