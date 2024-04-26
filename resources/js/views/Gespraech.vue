<template>
  <HeaderLayout>
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="nav">
            <h2 class="info">Personal Gespräch</h2>
          </div>
          <div class="space"></div>


          <div class="col-md-4">
            <label for="InputWorker" class="form-label">Wähle Mitarbeiter aus:</label>
            <select v-model="selectedWorker" class="form-select">
              <option value="">Wähle...</option>
              <option v-for="worker in workers" :key="worker">{{ worker }}</option>
            </select>
          </div>

          <div class="space"></div>
          <div>

            <div class="container">
              <div class="row align-items-start">
                <div class="col">
                  <b> Nr</b>
                </div>
                <div class="col-2">
                  <b> Frage</b>
                </div>
                <div class="col">
                  <b> Antwort Mitarbeiter</b>
                </div>
                <div class="col">
                  <b> Antwort Vorgesetzer</b>
                </div>
                <div class="col-4">
                  <b>Massnahme</b>
                </div>
                <div class="col-2">
                  <b>Erledigen bis</b>
                </div>
              </div>
              <p></p>
              <div class="row align-items-start" v-for="(item, index) in filteredQuestionsAndAnswers" :key="index">
                <div class="col">
                  {{ item.question_id }}
                </div>
                <div class="col-2">
                  {{ item.question_text }}
                </div>
                <div class="col">
                  {{ item.answer_value }}
                </div>
                <div class="col">
                  nicht relevant
                </div>
                <div class="col-4">
                  <textarea class="form-control" :id="'Textarea-' + index" rows="3"
                    v-model="actionText[index]"></textarea>
                </div>
                <div class="col-2">
                  <VueDatePicker v-model="executeDate[index]" />
                  <p v-if="item.date">{{ executeDate[index] }}</p>
                </div>
                <p></p>
              </div>

            </div>
            <div class="d-grid gap-2 p-5 d-md-flex justify-content-md-center">
              <button class="btn btn-swn btn-lg" type="button" @click="sendActions">Speichern</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </HeaderLayout>
</template>

<script>
import HeaderLayout from '@/layouts/headerBig.vue';
import axios from 'axios';
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'
import Swal from 'sweetalert2';

export default {

  components: {
    HeaderLayout,
    VueDatePicker,
  },
  data() {
    return {
      date: null,
      workers: [],
      selectedWorker: '',
      questionsAndAnswers: [],
      actionText: [],
      executeDate: [],
    };
  },
  mounted() {
    this.fetchQuestionsAndAnswers();
  },
  computed: {
    filteredQuestionsAndAnswers() {
      if (!this.selectedWorker) return [];
      return this.questionsAndAnswers.filter(item => item.worker_name === this.selectedWorker);
    },
  },
  methods: {
    async fetchQuestionsAndAnswers() {
      try {
        const response = await axios.get('/api/questions_and_answers');
        this.questionsAndAnswers = response.data;
        // WorkerWert bekommen
        this.workers = [...new Set(this.questionsAndAnswers.map(item => item.worker_name))];
      } catch (error) {
        console.error('Error fetching questions and answers:', error);
      }
    },

    sendActions() {
      // Abfrage-Array
      const requests = [];

      // Jede Action einzeln durchgehen und senden
      this.actionText.forEach((actionText, index) => {
        const questionId = this.filteredQuestionsAndAnswers[index].question_id;
        const workerName = this.selectedWorker;
        const executeDate = this.executeDate[index].toISOString();

        const request = axios.post('/api/actions', {
          question_id: questionId,
          action_text: actionText,
          worker_name: workerName,
          execute_date: executeDate
        });
        request.then(response => {
          console.log('Aktion erfolgreich gesendet:', response.data);

        })
          .catch(error => {
            console.error('Fehler beim Senden der Aktion:', error.response.data);
          });

        // Hinzufügen einer Abfrage zum Abfrage-Array
        requests.push(request);
      });

      // Warten, bis alle Anfragen erfüllt sind
      Promise.all(requests)
        .then(() => {

          Swal.fire({
            title: "Gesendet",
            confirmButtonColor: "#007684",
            text: "Danke für Teilnehmen",
            icon: "success"
          });
        })
        .catch(error => {

          console.error('Fehler beim Speichern der Aktionen:', error);
          Swal.fire({
            icon: "error",
            confirmButtonColor: "#007684",
            title: "Fehler beim Speichern der Aktionen.",
            text: "Bitte versuchen Sie es später erneut."
          });
        });
    }
  }
}

</script>

<style scoped>
@import '../../../public/app.css';
</style>
