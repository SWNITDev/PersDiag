<template>
  <HeaderLayout>
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="nav">
            <h2 class="info">Ergebnissen</h2>
          </div>
          <div class="space"></div>
          <div class="col-md-4">
            <label for="inputState" class="form-label">Wähle Jahr aus:</label>
            <select v-model="selectedYear" class="form-select">
              <option value="">Wähle...</option>
              <option v-for="year in years" :key="year">{{ year }}</option>
            </select>
            <label for="InputWorker" class="form-label">Wähle Mitarbeiter aus:</label>
            <select v-model="selectedWorker" class="form-select">
              <option value="">Wähle...</option>
              <option v-for="worker in workers" :key="worker">{{ worker }}</option>
            </select>
          </div>
          <div class="space"></div>
          <div>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Nr</th>
                  <th scope="col">Frage</th>
                  <th scope="col">Antwort Mitarbeiter</th>
                  <th scope="col">Antwort Vorgesetzter</th>
                  <th scope="col">Massnahme</th>
                  <th scope="col">Erfühlen bis</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(item, index) in combinedData" :key="index">
                  <th scope="row">{{ item.question_id }}</th>
                  <td>{{ item.question_text }}</td>
                  <td>{{ item.answer_value_worker }}</td>
                  <td>{{ item.answer_value_manager }}</td>
                  <td>{{ item.action_text }}</td>
                  <td>{{ item.execute_date }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </HeaderLayout>
</template>

<script setup>
import { ref, computed, onMounted, watch } from 'vue';
import axios from 'axios';
import HeaderLayout from '@/layouts/headerBig.vue';

const years = ref([]);
const selectedYear = ref('');
const workers = ref([]);
const selectedWorker = ref('');
const questionsAndAnswers = ref([]);
const AnswersAndActions = ref([]);
const activeName = ref('');

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
      workers.value = response.data;
      console.log('Fetched workers:', workers.value);
    })
    .catch(error => {
      console.error('Error fetching workers:', error.response.data);
    });
};

const fetchAnswersAndActions = async () => {
  try {
    const response = await axios.get('/api/answers_and_actions');
    AnswersAndActions.value = response.data;

    if (selectedWorker.value) {
      AnswersAndActions.value = AnswersAndActions.value.filter(
        item => item.worker_name === selectedWorker.value
      );
    }

    years.value = [...new Set(AnswersAndActions.value.map(item => item.year))];
    console.log('Fetched Answers and Actions:', AnswersAndActions.value);
    console.log('Available years:', years.value);

  } catch (error) {
    console.error('Error fetching actions and answers:', error);
  }
};

const fetchQuestionsAndAnswers = async () => {
  try {
    const response = await axios.get('/api/questions_and_answers');
    questionsAndAnswers.value = response.data;
    console.log('Fetched Questions and Answers:', questionsAndAnswers.value);
  } catch (error) {
    console.error('Error fetching questions and answers:', error);
  }
};

const filteredQuestionsAndAnswers = computed(() => {
  if (!selectedWorker.value || !activeName.value || !selectedYear.value) {
    console.log("No worker, active name, or year selected");
    return [];
  }

  if (!questionsAndAnswers.value || questionsAndAnswers.value.length === 0) {
    console.log("No questions and answers available");
    return [];
  }

  const selectedYearValue = parseInt(selectedYear.value, 10);
  const groupedItems = {};

  questionsAndAnswers.value.forEach(item => {
    const itemYear = parseInt(item.year, 10);
    if (itemYear !== selectedYearValue) {
      return;
    }

    if (groupedItems[item.question_id]) {
      if (item.worker_name === selectedWorker.value && item.activ_name === selectedWorker.value) {
        groupedItems[item.question_id].answer_value_worker = item.answer_value;
      } else if (item.worker_name === selectedWorker.value && item.activ_name === activeName.value) {
        groupedItems[item.question_id].answer_value_manager = item.answer_value;
      }
    } else {
      groupedItems[item.question_id] = {
        ...item,
        answer_value_worker: item.worker_name === selectedWorker.value && item.activ_name === selectedWorker.value ? item.answer_value : '',
        answer_value_manager: item.worker_name === selectedWorker.value && item.activ_name === activeName.value ? item.answer_value : '',
      };
    }
  });

  const result = Object.values(groupedItems);
  console.log('Filtered Questions and Answers:', result);
  return result;
});

const filteredAnswersAndActions = computed(() => {
  if (!selectedWorker.value || !selectedYear.value) {
    console.log("No worker or year selected");
    return [];
  }

  if (!AnswersAndActions.value || AnswersAndActions.value.length === 0) {
    console.log("No actions and answers available");
    return [];
  }

  const selectedYearValue = parseInt(selectedYear.value, 10);
  const groupedItems = {};

  AnswersAndActions.value.forEach(item => {
    const itemYear = parseInt(item.year, 10);
    if (itemYear !== selectedYearValue) {
      return;
    }

    if (groupedItems[item.question_id]) {
      groupedItems[item.question_id].action_text = item.action_text;
      groupedItems[item.question_id].execute_date = item.execute_date;
    } else {
      groupedItems[item.question_id] = {
        ...item,
        action_text: item.action_text || '',
        execute_date: item.execute_date || '',
      };
    }
  });

  const result = Object.values(groupedItems);
  console.log('Filtered Answers and Actions:', result);
  return result;
});

const combinedData = computed(() => {
  const questionsAndAnswersMap = filteredQuestionsAndAnswers.value.reduce((acc, item) => {
    acc[item.question_id] = item;
    return acc;
  }, {});

  const combined = filteredAnswersAndActions.value.map(actionItem => {
    const correspondingQA = questionsAndAnswersMap[actionItem.question_id];
    return {
      ...correspondingQA,
      ...actionItem
    };
  });

  console.log('Combined Data:', combined);
  return combined;
});

watch([selectedWorker, selectedYear], () => {
  fetchAnswersAndActions();
  fetchQuestionsAndAnswers();
});

onMounted(() => {
  fetchUserName();
  fetchWorkers();
  fetchAnswersAndActions();
  fetchQuestionsAndAnswers();
});
</script>

<style scoped>
@import '../../../public/app.css';
</style>
