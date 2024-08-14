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
                  {{ item.answer_value_worker }}
                </div>
                <div class="col">
                  {{ item.answer_value_manager }}
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
              <button class="btn btn-swn btn-lg" type="button" @click="filteredQuestionsAndAnswers">filter</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </HeaderLayout>
</template>

<script setup>
import { watch } from 'vue';
import { ref, computed, onMounted } from 'vue';
import axios from 'axios';
import Swal from 'sweetalert2';
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css';
import HeaderLayout from '@/layouts/headerBig.vue';

// State variables
const date = ref(null);
const activeName = ref('');
const workers = ref([]);
const selectedWorker = ref('');
const questionsAndAnswers = ref([]);
const actionText = ref([]);
const executeDate = ref([]);



const fetchUserName = async () => {
  try {
    const response = await axios.get('/user/manager');
    activeName.value = response.data.userName;
    console.log('Active Name fetched:', activeName.value); 
  } catch (error) {
    console.error('Error fetching activeName:', error);
  }
};

const fetchWorkers = () => {
  axios.get('/user/reporters')
    .then(response => {
      workers.value = response.data; // Предполагается, что сервер возвращает массив работников
      console.log('Fetched workers:', workers.value);
    })
    .catch(error => {
      console.error('Error fetching workers:', error.response.data);
    });
};

// Computed property to filter questions by selected worker 
const filteredQuestionsAndAnswers = computed(() => {
  if (!selectedWorker.value || !activeName.value) {
    console.log("No worker or active name selected");
    return [];
  }

  const currentYear = new Date().getFullYear();

  return questionsAndAnswers.value
    .filter(item => {
      const itemYear = new Date(item.date).getFullYear();
      console.log(`Item date: ${item.date}, Year: ${itemYear}, Is current year: ${itemYear === currentYear}`);
      return itemYear === currentYear;
    })
    .map(item => {
      const answer_value_worker = (item.worker_name === selectedWorker.value && item.activ_name === selectedWorker.value) 
        ? item.answer_value 
        : '';

      const answer_value_manager = (item.worker_name === selectedWorker.value && item.activ_name === activeName.value) 
        ? item.answer_value 
        : '';

      console.log(`Item: ${item.question_id}, Worker: ${item.worker_name}, Activ: ${item.activ_name}`);
      console.log('Assigned values:', {
        answer_value_worker: answer_value_worker,
        answer_value_manager: answer_value_manager,
      });

      return {
        ...item,
        answer_value_worker,
        answer_value_manager,
      };
    });
});



// Fetch questions and answers
const fetchQuestionsAndAnswers = async () => {
  try {
    const response = await axios.get('/api/questions_and_answers');
    questionsAndAnswers.value = response.data;
  } catch (error) {
    console.error('Error fetching questions and answers:', error);
  }
};



// Send actions to the server
const sendActions = () => {
  const requests = [];

  actionText.value.forEach((actionText, index) => {
    const questionId = filteredQuestionsAndAnswers.value[index].question_id;
    const workerName = selectedWorker.value;
    const executeDateFormatted = executeDate.value[index].toISOString();

    const request = axios.post('/api/actions', {
      question_id: questionId,
      action_text: actionText,
      worker_name: workerName,
      execute_date: executeDateFormatted,
    });

    request.then(response => {
      console.log('Aktion erfolgreich gesendet:', response.data);
    }).catch(error => {
      console.error('Fehler beim Senden der Aktion:', error.response.data);
    });

    requests.push(request);
  });

  Promise.all(requests)
    .then(() => {
      Swal.fire({
        title: "Gesendet",
        confirmButtonColor: "#007684",
        text: "Danke für Teilnehmen",
        icon: "success",
      });
    })
    .catch(error => {
      console.error('Fehler beim Speichern der Aktionen:', error);
      Swal.fire({
        icon: "error",
        confirmButtonColor: "#007684",
        title: "Fehler beim Speichern der Aktionen.",
        text: "Bitte versuchen Sie es später erneut.",
      });
    });
};

// Method to manually trigger recomputation if needed
const recomputeFilter = () => {
  // Manually change a reactive property or just access the computed property
  console.log('Recomputed Filter:', filteredQuestionsAndAnswers.value);
};


// Fetch data and ensure data dependencies are ready
onMounted(async () => {
  await fetchWorkers();
  await fetchUserName();
  await fetchQuestionsAndAnswers();
  // Optionally, you can call recomputeFilter here to force a recomputation if needed
  recomputeFilter();
});

console.log('Selected Worker:', selectedWorker.value);
console.log('Active Name:', activeName.value);
console.log('Questions and Answers:', questionsAndAnswers.value);
console.log('Filtered:', filteredQuestionsAndAnswers.value);

watch([selectedWorker, activeName, questionsAndAnswers], () => {
  console.log('Selected Worker changed:', selectedWorker.value);
  console.log('Active Name changed:', activeName.value);
  console.log('Filtered Questions and Answers:', filteredQuestionsAndAnswers.value);
  console.log('Recomputing due to changes...');
  recomputeFilter();
});
</script>

<style scoped>
@import '../../../public/app.css';
</style>
