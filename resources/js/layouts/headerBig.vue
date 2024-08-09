<template>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PerspektivDialog</title>
  </head>
  <div class="header">
    <header class="mb-3 border-bottom">
      <div class="container">
        <div class="d-flex flex-wrap align-items-between justify-content-between justify-content-lg-between">
          <div>
            <img
              src="https://www.stadtwerke-neumuenster.de/typo3conf/ext/swn_template/Resources/Public/Assets/img/svg/logo.svg"
              width="110" alt="Logo">
          </div>
          <div class="p-4">
            <h1>Perspektivdialog</h1>
          </div>
          <div class="p-4">
            <button type="button" @click="azureLogin" class="btn btn-swn">Sign in</button>
            <button v-if="isHome" @click="goToInfo" class="btn btn-swn">Info</button>
            <button v-else @click="goHome" class="btn btn-swn">Home</button>
          </div>
        </div>
      </div>
    </header>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-2">
        <div class="space"></div>
        <p>Hallo {{ userName }}!</p>
        <div class="list-group">
          <button type="button" @click="goToInfo" class="list-group-item list-group-item-action">Meine
            Bewertungen</button>
          <button type="button" @click="goToErgebnissen" class="list-group-item list-group-item-action">Meine
            Ergebnissen</button>
        </div>
        <div class="space"></div>
        <p>Mitarbeitern Bewertungen</p>
        <div class="list-group">
          <button type="button" @click="goToMainWorker" class="list-group-item list-group-item-action">Mitarbeitern
            Bewerten</button>
          <button type="button" @click="goToGespraech"
            class="list-group-item list-group-item-action">PersonalGespräch</button>
          <button type="button" @click="goToErgebnisseMitarbeiter"
            class="list-group-item list-group-item-action">Ergebnisse</button>
        </div>
      </div>
      <div class="col-10">
        <slot></slot>
      </div>
    </div>
  </div>




</template>

<script setup>
import axios from 'axios';
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router'
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

const router = useRouter()
const currentRoute = router.currentRoute.value
const isHome = currentRoute.path === '/'

const goToInfo = () => {
  router.push('/info')
}

const goToMainWorker = () => {
  router.push('/mainWorker')
}

const goHome = () => {
  router.push('/')
}

const azureLogin = () => {
  router.push('login/azure')
}

const goToGespraech = () => {
  router.push('/gespraech')
}
const goToErgebnissen = () => {
  router.push('/ergebnisse')
}
const goToErgebnisseMitarbeiter = () => {
  router.push('/ergebnisse_mitarbeiter')
}

// Fetch userName
const userName = ref('');  // Ref to hold userName

const fetchUserName = async () => {
  try {
    const response = await axios.get('/user/manager');
    userName.value = response.data.userName;
  } catch (error) {
    console.error('Error fetching userName:', error);
  }
}

// Fetch the userName when the component is mounted
onMounted(() => {
  fetchUserName();
});


</script>

<script>
export default {
  name: 'HeaderBig'
};
</script>

<style>
@import '../../../public/app.css';
</style>