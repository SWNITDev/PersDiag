<template>
    <div class="modal fade" tabindex="-1" role="dialog" v-show="showModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">{{ title }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeModal">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p v-if="showWarning" class="text-danger">{{ message }}</p>
            <p v-if="showOk" class="text-info">{{ message }}</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="closeModal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  const showModal = ref(false);
  const showWarning = ref(false);
  const showOk = ref(false);
  const title = ref('');
  const message = ref('');
  
  const closeModal = () => {
    showModal.value = false;
  };
  </script>
  