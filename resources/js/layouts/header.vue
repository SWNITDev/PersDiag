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


    <slot></slot>
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

const azureLogin = () => {
  router.push('login/azure')
}

const goHome = () => {
  router.push('/')
}
</script>

<script>
export default {
  name: 'Header'
};
</script>

<style>
/* Stile für das Layout */
</style>