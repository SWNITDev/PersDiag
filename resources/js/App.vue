<template>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="\app.css" rel="stylesheet">
    <title>Perspektivdialog</title>
  </head>

  <body class="d-flex flex-column h-100">
    <header class="mb-3 border-bottom">
      <div class="container">
        <div class="d-flex flex-wrap align-items-between justify-content-between justify-content-lg-between">
          <div>
            <img src='/public/img/logo_swn.png' width='110px'>
          </div>
          <div class="p-4">
            <h1>Perspektivdialog</h1>
          </div>
          <div class="p-4">
            <button type="button" class="btn btn-swn">Sign-up</button>
          </div>
        </div>
      </div>
    </header>

    <div class="container-fluid flex-shrink-0">
      <div class="container">
        <h3 class="p-3"> Liebe Mitarbeiterinnen und Mitarbeiter,</h3>

        <p>Wir freuen uns, dass Sie an unserer Umfrage teilnehmen! Ihre Meinung und Ihre Erfahrungen sind uns äußerst
          wichtig,
          da sie uns dabei helfen, unser Unternehmen kontinuierlich zu verbessern und Ihnen ein besseres Arbeitsumfeld zu
          bieten. Ihre Teilnahme ist entscheidend, und wir schätzen Ihre Zeit und Mühe.</p>
        <p class="p-3">Herzlichen Dank und beste Grüße</p>
      </div>
      <div class="container">
        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button erste" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                aria-expanded="true" aria-controls="collapseOne">
                <i class="bi-alarm" style="font-size: 2rem; color: cornflowerblue;"></i> Fach- und Medienkompetenzen
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
              data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <div class="row"  v-for="(question, index) in questions.slice(0, 6)" :key="index">
                  <div class="col-2">
                    {{ question.question_text }}
                  </div>
                  <div class="col-6">
                    <p>{{ question.question_description }}</p>
                  </div>

                  <div class="col-4">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
          <input type="radio" class="btn-check" :name="'btnradio_' + index" :id="'fm1_' + index" v-model="selectedOptionGroups[index]" :value="1">
          <label class="btn btn-outline-primary" :for="'fm1_' + index">1</label>

          <input type="radio" class="btn-check" :name="'btnradio_' + index" :id="'fm2_' + index" v-model="selectedOptionGroups[index]" :value="2">
          <label class="btn btn-outline-primary" :for="'fm2_' + index">2</label>

          <input type="radio" class="btn-check" :name="'btnradio_' + index" :id="'fm3_' + index" v-model="selectedOptionGroups[index]" :value="3">
          <label class="btn btn-outline-primary" :for="'fm3_' + index">3</label>

          <input type="radio" class="btn-check" :name="'btnradio_' + index" :id="'fm4_' + index" v-model="selectedOptionGroups[index]" :value="4">
          <label class="btn btn-outline-primary" :for="'fm4_' + index">4</label>

          <input type="radio" class="btn-check" :name="'btnradio_' + index" :id="'fm5_' + index" v-model="selectedOptionGroups[index]" :value="5">
          <label class="btn btn-outline-primary" :for="'fm5_' + index">Nicht relevant</label>
        </div>
      </div>
      <hr>
    </div>
  </div>
  
  </div>
</div>




<div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed zweite" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Personale Kompetenzen
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
              data-bs-parent="#accordionExample">
              <div class="accordion-body">

                <div class="row"  v-for="(question, index) in questions.slice(6, 18)" :key="index">
                  <div class="col-2">
                    {{ question.question_text }}
                  </div>
                  <div class="col-6">
                    <p>{{ question.question_description }}</p>
                  </div>

                  <div class="col-4">
          <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
          <input type="radio" class="btn-check" :name="'btnradio_' + (index + 6)" :id="'pk1_' + index" v-model="selectedOptionGroups[index + 6]" :value="1">
          <label class="btn btn-outline-primary" :for="'pk1_' + index">1</label>

          <input type="radio" class="btn-check" :name="'btnradio_' + (index + 6)" :id="'pk2_' + index" v-model="selectedOptionGroups[index + 6]" :value="2">
          <label class="btn btn-outline-primary" :for="'pk2_' + index">2</label>

          <input type="radio" class="btn-check" :name="'btnradio_' + (index + 6)" :id="'pk3_' + index" v-model="selectedOptionGroups[index + 6]" :value="3">
          <label class="btn btn-outline-primary" :for="'pk3_' + index">3</label>

          <input type="radio" class="btn-check" :name="'btnradio_' + (index + 6)" :id="'pk4_' + index" v-model="selectedOptionGroups[index + 6]" :value="4">
          <label class="btn btn-outline-primary" :for="'pk4_' + index">4</label>

          <input type="radio" class="btn-check" :name="'btnradio_' + (index + 6)" :id="'pk5_' + index" v-model="selectedOptionGroups[index + 6]" :value="5">
          <label class="btn btn-outline-primary" :for="'pk5_' + index">Nicht relevant</label>
        </div>
      </div>
      <hr>
    </div>
  </div>
</div>
</div>


<div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed dritte" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Lernkompetenz
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
              data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <div class="row"  v-for="(question, index) in questions.slice(18, 20)" :key="index">
                  <div class="col-2">
                    {{ question.question_text }}
                  </div>
                  <div class="col-6">
                    <p>{{ question.question_description }}</p>
                  </div>

                  <div class="col-4">
          <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
          <input type="radio" class="btn-check" :name="'btnradio_' + (index + 18)" :id="'lk1_' + index" v-model="selectedOptionGroups[index + 18]" :value="1">
          <label class="btn btn-outline-primary" :for="'lk1_' + index">1</label>

          <input type="radio" class="btn-check" :name="'btnradio_' + (index + 18)" :id="'lk2_' + index" v-model="selectedOptionGroups[index + 18]" :value="2">
          <label class="btn btn-outline-primary" :for="'lk2_' + index">2</label>

          <input type="radio" class="btn-check" :name="'btnradio_' + (index + 18)" :id="'lk3_' + index" v-model="selectedOptionGroups[index + 18]" :value="3">
          <label class="btn btn-outline-primary" :for="'lk3_' + index">3</label>

          <input type="radio" class="btn-check" :name="'btnradio_' + (index + 18)" :id="'lk4_' + index" v-model="selectedOptionGroups[index + 18]" :value="4">
          <label class="btn btn-outline-primary" :for="'lk4_' + index">4</label>

          <input type="radio" class="btn-check" :name="'btnradio_' + (index + 18)" :id="'lk5_' + index" v-model="selectedOptionGroups[index + 18]" :value="5">
          <label class="btn btn-outline-primary" :for="'lk5_' + index">Nicht relevant</label>
        </div>
      </div>
      <hr>
    </div>
  </div>
</div>
</div>


<div class="accordion-item">
            <h2 class="accordion-header" id="headingVier">
              <button class="accordion-button collapsed vierte" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseVier" aria-expanded="true" aria-controls="collapseVier">
                Führungskompetenz
              </button>
            </h2>
            <div id="collapseVier" class="accordion-collapse collapse" aria-labelledby="headingVier"
              data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <div class="row"  v-for="(question, index) in questions.slice(20, 33)" :key="index">
                  <div class="col-2">
                    {{ question.question_text }}
                  </div>
                  <div class="col-6">
                    <p>{{ question.question_description }}</p>
                  </div>

                  <div class="col-4">
          <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
          <input type="radio" class="btn-check" :name="'btnradio_' + (index + 20)" :id="'fk1_' + index" v-model="selectedOptionGroups[index + 20]" :value="1">
          <label class="btn btn-outline-primary" :for="'fk1_' + index">1</label>

          <input type="radio" class="btn-check" :name="'btnradio_' + (index + 20)" :id="'fk2_' + index" v-model="selectedOptionGroups[index + 20]" :value="2">
          <label class="btn btn-outline-primary" :for="'fk2_' + index">2</label>

          <input type="radio" class="btn-check" :name="'btnradio_' + (index + 20)" :id="'fk3_' + index" v-model="selectedOptionGroups[index + 20]" :value="3">
          <label class="btn btn-outline-primary" :for="'fk3_' + index">3</label>

          <input type="radio" class="btn-check" :name="'btnradio_' + (index + 20)" :id="'fk4_' + index" v-model="selectedOptionGroups[index + 20]" :value="4">
          <label class="btn btn-outline-primary" :for="'fk4_' + index">4</label>

          <input type="radio" class="btn-check" :name="'btnradio_' + (index + 20)" :id="'fk5_' + index" v-model="selectedOptionGroups[index + 20]" :value="5">
          <label class="btn btn-outline-primary" :for="'fk5_' + index">Nicht relevant</label>
        </div>
      </div>
      <hr>
    </div>
  </div>
</div>
</div>

</div>
</div>
</div>

<div class="d-grid gap-2 p-5 d-md-flex justify-content-md-end">
    <button class="btn btn-swn btn-lg" type="button" @click="checkSelection">Senden</button>
    
  </div>
</body>
</html>
</template>



<script setup>
import axios from 'axios';
import { ref, onMounted } from 'vue';
import Swal from 'sweetalert2';


const questions = ref([]);
const selectedOptionGroups = ref([]);

const fetchQuestions = () => {
  axios.get('/api/questions/question_text_and_description')
    .then(response => {
      questions.value = response.data;
      selectedOptionGroups.value = Array(response.data.length).fill('0'); // Initialisiere die Array-Länge für die Antworten
    })
    .catch(error => {
      console.error('Error fetching questions:', error);
    });
};

onMounted(() => {
  fetchQuestions();
});

const showWarning = ref(false);
const showOk = ref(false);

function getSelectedOptionLabel(optionValue) {
  switch (optionValue) {
    case '1':
      return '1';
    case '2':
      return '2';
    case '3':
      return '3';
    case '4':
      return '4';
    case '5':
      return 'Nicht relevant';
    default:
      return '';
  }
}

function checkSelection() {
  let hasUnselected = false;

  for (let i = 0; i < selectedOptionGroups.value.length; i++) {
    if (selectedOptionGroups.value[i] === '0') {
      showWarning.value = true;
      hasUnselected = true;
      Swal.fire({
        icon: "error",
        title: "Nicht alle Fragen sind beantwortet.",
        text: "Überprüfen Sie bitte Ihre Bewertung."
      });
      break;
    }
  }

  if (!hasUnselected) {
    showWarning.value = false;
    showOk.value = true;
    Swal.fire({
  title: "Möchten Sie Bewertung abschicken?",
  text: " ",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  cancelButtonText: "Abbrechen", 
  confirmButtonText: "Ja, senden"
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire({
      title: "Gesendet",
      text: "Danke für Teilnehmen",
      icon: "success"
    });
  }
});
  }
}
</script>
