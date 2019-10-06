<template>
    <div>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <router-link :to="{name: 'departement'}" class="navbar-brand">Departements</router-link>
            </li>
            <li class="nav-item">
                <router-link :to="{name: 'filiere'}" class="navbar-brand">Filieres</router-link>
            </li>
            <li class="nav-item">
                <router-link :to="{name: 'prof'}" class="navbar-brand">Profs</router-link>
            </li>
            <li class="nav-item">
                <router-link :to="{name: 'responsable'}" class="navbar-brand">Responsables</router-link>
            </li>
            <li class="nav-item">
                <router-link :to="{name: 'coordinateur'}" class="navbar-brand">Coordinateurs</router-link>
            </li>
        </ul>
        <router-view></router-view>
    </div>
</template>

<script>

    export default{
        name: 'layout'
    }
</script>