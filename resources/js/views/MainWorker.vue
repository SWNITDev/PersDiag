<template>
  <HeaderLayout>
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="nav">
            <h2>Mitarbeitern bewerten</h2>
          </div>
          <div class="space"></div>
          <p>In diesem Bereich können Sie Ihren Miarbeiter Bewerten</p>
          <div class="col-md-4">
            <label for="InputWorker" class="form-label">Wähle Mitarbeiter aus:</label>
            <select v-model="selectedWorker" class="form-select">
              <option value="">Wähle...</option>
              <option v-for="worker in workers" :key="worker">{{ worker }}</option>
            </select>
          </div>
          <div class="space"></div>

          <div class="container">
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button erste" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <i class="bi-alarm" style="font-size: 2rem; color: cornflowerblue;"></i> Fach- und Medienkompetenzen
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                  data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <div class="row" v-for="(question, index) in questions.slice(0, 6)" :key="index">
                      <div class="col-2">
                        {{ question.question_text }}
                      </div>
                      <div class="col">
                        <p>{{ question.question_description }}</p>
                      </div>

                      <div class="col-4">
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                          <input type="radio" class="btn-check" :name="'btnradio_' + index" :id="'fm1_' + index"
                            v-model="selectedOptionGroups[index]" :value="1">
                          <label class="btn btn-outline-primary" :for="'fm1_' + index">1</label>

                          <input type="radio" class="btn-check" :name="'btnradio_' + index" :id="'fm2_' + index"
                            v-model="selectedOptionGroups[index]" :value="2">
                          <label class="btn btn-outline-primary" :for="'fm2_' + index">2</label>

                          <input type="radio" class="btn-check" :name="'btnradio_' + index" :id="'fm3_' + index"
                            v-model="selectedOptionGroups[index]" :value="3">
                          <label class="btn btn-outline-primary" :for="'fm3_' + index">3</label>

                          <input type="radio" class="btn-check" :name="'btnradio_' + index" :id="'fm4_' + index"
                            v-model="selectedOptionGroups[index]" :value="4">
                          <label class="btn btn-outline-primary" :for="'fm4_' + index">4</label>

                          <input type="radio" class="btn-check" :name="'btnradio_' + index" :id="'fm5_' + index"
                            v-model="selectedOptionGroups[index]" :value="'Nicht relevant'">
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

                    <div class="row" v-for="(question, index) in questions.slice(6, 18)" :key="index">
                      <div class="col-2">
                        {{ question.question_text }}
                      </div>
                      <div class="col">
                        <p>{{ question.question_description }}</p>
                      </div>

                      <div class="col-4">
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                          <input type="radio" class="btn-check" :name="'btnradio_' + (index + 6)" :id="'pk1_' + index"
                            v-model="selectedOptionGroups[index + 6]" :value="1">
                          <label class="btn btn-outline-primary" :for="'pk1_' + index">1</label>

                          <input type="radio" class="btn-check" :name="'btnradio_' + (index + 6)" :id="'pk2_' + index"
                            v-model="selectedOptionGroups[index + 6]" :value="2">
                          <label class="btn btn-outline-primary" :for="'pk2_' + index">2</label>

                          <input type="radio" class="btn-check" :name="'btnradio_' + (index + 6)" :id="'pk3_' + index"
                            v-model="selectedOptionGroups[index + 6]" :value="3">
                          <label class="btn btn-outline-primary" :for="'pk3_' + index">3</label>

                          <input type="radio" class="btn-check" :name="'btnradio_' + (index + 6)" :id="'pk4_' + index"
                            v-model="selectedOptionGroups[index + 6]" :value="4">
                          <label class="btn btn-outline-primary" :for="'pk4_' + index">4</label>

                          <input type="radio" class="btn-check" :name="'btnradio_' + (index + 6)" :id="'pk5_' + index"
                            v-model="selectedOptionGroups[index + 6]" :value="'Nicht relevant'">
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
                    <div class="row" v-for="(question, index) in questions.slice(18, 20)" :key="index">
                      <div class="col-2">
                        {{ question.question_text }}
                      </div>
                      <div class="col">
                        <p>{{ question.question_description }}</p>
                      </div>

                      <div class="col-4">
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                          <input type="radio" class="btn-check" :name="'btnradio_' + (index + 18)" :id="'lk1_' + index"
                            v-model="selectedOptionGroups[index + 18]" :value="1">
                          <label class="btn btn-outline-primary" :for="'lk1_' + index">1</label>

                          <input type="radio" class="btn-check" :name="'btnradio_' + (index + 18)" :id="'lk2_' + index"
                            v-model="selectedOptionGroups[index + 18]" :value="2">
                          <label class="btn btn-outline-primary" :for="'lk2_' + index">2</label>

                          <input type="radio" class="btn-check" :name="'btnradio_' + (index + 18)" :id="'lk3_' + index"
                            v-model="selectedOptionGroups[index + 18]" :value="3">
                          <label class="btn btn-outline-primary" :for="'lk3_' + index">3</label>

                          <input type="radio" class="btn-check" :name="'btnradio_' + (index + 18)" :id="'lk4_' + index"
                            v-model="selectedOptionGroups[index + 18]" :value="4">
                          <label class="btn btn-outline-primary" :for="'lk4_' + index">4</label>

                          <input type="radio" class="btn-check" :name="'btnradio_' + (index + 18)" :id="'lk5_' + index"
                            v-model="selectedOptionGroups[index + 18]" :value="'Nicht relevant'">
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
                    <div class="row" v-for="(question, index) in questions.slice(20, 33)" :key="index">
                      <div class="col-2">
                        {{ question.question_text }}
                      </div>
                      <div class="col">
                        <p>{{ question.question_description }}</p>
                      </div>

                      <div class="col-4">
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                          <input type="radio" class="btn-check" :name="'btnradio_' + (index + 20)" :id="'fk1_' + index"
                            v-model="selectedOptionGroups[index + 20]" :value="1">
                          <label class="btn btn-outline-primary" :for="'fk1_' + index">1</label>

                          <input type="radio" class="btn-check" :name="'btnradio_' + (index + 20)" :id="'fk2_' + index"
                            v-model="selectedOptionGroups[index + 20]" :value="2">
                          <label class="btn btn-outline-primary" :for="'fk2_' + index">2</label>

                          <input type="radio" class="btn-check" :name="'btnradio_' + (index + 20)" :id="'fk3_' + index"
                            v-model="selectedOptionGroups[index + 20]" :value="3">
                          <label class="btn btn-outline-primary" :for="'fk3_' + index">3</label>

                          <input type="radio" class="btn-check" :name="'btnradio_' + (index + 20)" :id="'fk4_' + index"
                            v-model="selectedOptionGroups[index + 20]" :value="4">
                          <label class="btn btn-outline-primary" :for="'fk4_' + index">4</label>

                          <input type="radio" class="btn-check" :name="'btnradio_' + (index + 20)" :id="'fk5_' + index"
                            v-model="selectedOptionGroups[index + 20]" :value="'Nicht relevant'">
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
          <div class="d-grid gap-2 p-5 d-md-flex justify-content-md-center">
            <button class="btn btn-swn btn-lg" type="button" @click="checkSelection">Senden</button>
          </div>
        </div>
      </div>
    </div>
  </HeaderLayout>

</template>


<script setup>
import axios from 'axios';
import { ref, onMounted } from 'vue';
import Swal from 'sweetalert2';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import { useRoute, useRouter } from 'vue-router';


const router = useRouter()
const route = useRoute()
const selectedWorker = ref('');
const questions = ref([]);
const selectedOptionGroups = ref([]);

// Funktion zum Abrufen von Fragen vom Server
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

// Funktion zum Senden von Antworten an den Server
function sendAnswers() {
  // Erstelle ein Array von Promises für alle Anfragen
  const requests = [];

  // Gehe jede Antwort und Frage-ID durch
  selectedOptionGroups.value.forEach((value, index) => {
    const questionId = questions.value[index].id;
    const answerValue = value;

    // Füge die Anfrage zum Array von Promises hinzu
    requests.push(
      axios.post('/api/questions/answer_value', { question_id: questionId, answer_value: answerValue, worker_name: selectedWorker })
    );
  });

  // Warte auf die Ausführung aller Anfragen
  Promise.all(requests)
    .then(() => {
      // Wenn alle Antworten erfolgreich gespeichert wurden, zeige eine Erfolgsmeldung an
      Swal.fire({
        title: "Gesendet",
        confirmButtonColor: "#007684",
        text: "Danke für Teilnehmen",
        icon: "success"
      });
    })
    .catch(error => {
      // Wenn ein Fehler bei einer der Anfragen auftritt, zeige eine Fehlermeldung an
      console.error('Error saving answers:', error);
      Swal.fire({
        icon: "error",
        title: "Fehler beim Speichern der Antworten.",
        text: "Bitte versuchen Sie es später erneut."
      });
    });
}
// Funktion zur Überprüfung der Auswahl von Antworten vor dem Senden
function checkSelection() {
  let hasUnselected = false;

  // Überprüfe, ob für jede Frage eine Antwort ausgewählt wurde
  for (let i = 0; i < selectedOptionGroups.value.length; i++) {
    if (selectedOptionGroups.value[i] === '0') {
      hasUnselected = true;
      Swal.fire({
        icon: "error",
        confirmButtonColor: "#007684",
        title: "Nicht alle Fragen sind beantwortet.",
        text: "Überprüfen Sie bitte Ihre Bewertung."
      });
      break;
    }
  }

  // Wenn alle Antworten ausgewählt sind, sende sie an den Server
  if (!hasUnselected) {
    if (!selectedWorker.value) {
      Swal.fire({
        icon: "error",
        confirmButtonColor: "#007684",
        title: "Bitte wählen Sie einen Mitarbeiter aus.",
        text: "Bitte wählen Sie einen Mitarbeiter aus, bevor Sie fortfahren."
      });
      return;
    }

    Swal.fire({
      title: "Möchten Sie Bewertung abschicken?",
      text: " ",
      icon: "question",
      showCancelButton: true,
      confirmButtonColor: "#007684",
      cancelButtonColor: "#d33",
      cancelButtonText: "Abbrechen",
      confirmButtonText: "Ja, senden"
    }).then((result) => {
      if (result.isConfirmed) {
        sendAnswers();
      }
    });
  }
}
</script>

<script>
import HeaderLayout from '@/layouts/headerBig.vue';

export default {
  components: {
    HeaderLayout
  },

  data() {
    return {
      date: null,
      workers: [],
      selectedWorker: '',
    };
  },

}
</script>

<style>
@import '../../../public/app.css';
</style>
