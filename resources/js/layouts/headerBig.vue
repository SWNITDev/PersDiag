<template>
  <div class="header">
    <!-- Header -->
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
            <button type="button" class="btn btn-swn">Sign-up</button>
            <button v-if="isHome" @click="goToInfo" class="btn btn-swn">Info</button>
            <button v-else @click="goHome" class="btn btn-swn">Home</button>
          </div>
        </div>
      </div>
    </header>
  </div>


    <div class="container-fluid flex-shrink-0">
      <div class="container">
        <div class="row">
          <div class="col-2">
            <div class="space"></div>
        <p>Hallo WorkerName!</p>
        <div class="list-group">
          <button type="button" class="list-group-item list-group-item-action">Meine Bewertungen</button>
          <button type="button" class="list-group-item list-group-item-action">Meine Ergebnissen</button>
        </div>
        <div class="space"></div>
        <p>Mitarbeitern Bewertungen</p>
        <div class="list-group">
          <button type="button" class="list-group-item list-group-item-action">Mitarbeitern Bewerten</button>
          <button type="button" class="list-group-item list-group-item-action">PersonalGespräch</button>
          <button type="button" class="list-group-item list-group-item-action">Ergebnisse</button>
        </div>
      </div>
      <div class="col-8">
      <slot></slot>
      </div>
      </div>
    </div>
</div>


    

</template>

<script setup>
import { useRouter } from 'vue-router'

const router = useRouter()
const currentRoute = router.currentRoute.value
const isHome = currentRoute.path === '/'

const goToInfo = () => {
  router.push('/info')
}

const goHome = () => {
  router.push('/')
}
</script>

<script>
export default {
  name: 'HeaderBig'
};
</script>

<style>
@import '../../../public/app.css';
</style>