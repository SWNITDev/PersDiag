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
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import Swal from 'sweetalert2';

// Initialize router
const router = useRouter();

// Determine if the current route is the home route
const currentRoute = router.currentRoute.value;
const isHome = ref(currentRoute.path === '/');

// Navigate to info page
const goToInfo = () => {
  router.push('/info');
};

// Handle Azure login and reload page
const azureLogin = () => {
  router.push('login/azure').then(() => {
    window.location.reload();
  });
};

// Navigate to home page
const goHome = () => {
  router.push('/');
};

// Show the login modal
const showLoginModal = () => {
  Swal.fire({
    icon: 'info',
    title: 'Login ist erforderlich',
    text: 'Bitte drücken Sie den Knopf',
    showCancelButton: false,
    confirmButtonText: 'Sign in',
    confirmButtonColor: '#007684',
  }).then((result) => {
    if (result.isConfirmed) {
      azureLogin();
    }
  });
};

// Check if the login modal has been shown before
const checkAndShowLoginModal = () => {
  const hasShownLoginModal = localStorage.getItem('hasShownLoginModal');
  const lastShownTime = localStorage.getItem('loginModalTimestamp');
  
  const currentTime = new Date().getTime();
  const twoHour = 7200000;

  if (!hasShownLoginModal || !lastShownTime || (currentTime - parseInt(lastShownTime)) > twoHour) {
    showLoginModal();
    localStorage.setItem('hasShownLoginModal', 'true');
    localStorage.setItem('loginModalTimestamp', currentTime.toString());
  }
};

// Show login modal once when component is mounted
onMounted(() => {
  checkAndShowLoginModal();
});
</script>

<script>
export default {
  name: 'Header'
};
</script>

<style>
/* Stile für das Layout */
</style>