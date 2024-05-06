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
        </div>
      </div>
          <div class="space"></div>

          <div class="container">
      <div class="accordion" id="accordionExample">
        <!-- Петля по категориям -->
        <div v-for="(category, categoryIndex) in groupedQuestions" :key="categoryIndex">
          <div class="accordion-item" :key="'category_' + categoryIndex">
            <h2 class="accordion-header" :id="'heading' + categoryIndex">
              <button class="accordion-button erste" type="button" 
                :data-bs-toggle="'collapse'"
                :data-bs-target="'#collapse' + categoryIndex" 
                :aria-expanded="categoryIndex === 0"
                :aria-controls="'collapse' + categoryIndex"
                :class="[`btn-color-${categoryIndex}`]">
                {{ category.name }}
              </button>
            </h2>
            <div :id="'collapse' + categoryIndex" class="accordion-collapse collapse"
              :aria-labelledby="'heading' + categoryIndex" :data-bs-parent="'#accordionExample'">
              <div class="accordion-body">
                <!-- Петля по вопросам в текущей категории -->
                <div v-for="(question, questionIndex) in category.questions" :key="'question_' + questionIndex">
                  <div class="row">
                    <div class="col-2">{{ question.question_text }}</div>
                    <div class="col-6">{{ question.question_description }}</div>
                    <div class="col-4">
                      <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <!-- Исправленный код для кнопок выбора ответов -->

                        <input type="radio" class="btn-check" :name="'btnradio_' + categoryIndex + '_' + questionIndex"
                          :id="'option_' + categoryIndex + '_' + questionIndex + '_1'"
                          v-model="selectedOptionGroups[categoryIndex][questionIndex]" :value="1">
                        <label class="btn btn-outline-primary"
                          :for="'option_' + categoryIndex + '_' + questionIndex + '_1'">1</label>

                        <input type="radio" class="btn-check" :name="'btnradio_' + categoryIndex + '_' + questionIndex"
                          :id="'option_' + categoryIndex + '_' + questionIndex + '_2'"
                          v-model="selectedOptionGroups[categoryIndex][questionIndex]" :value="2">
                        <label class="btn btn-outline-primary"
                          :for="'option_' + categoryIndex + '_' + questionIndex + '_2'">2</label>

                        <input type="radio" class="btn-check" :name="'btnradio_' + categoryIndex + '_' + questionIndex"
                          :id="'option_' + categoryIndex + '_' + questionIndex + '_3'"
                          v-model="selectedOptionGroups[categoryIndex][questionIndex]" :value="3">
                        <label class="btn btn-outline-primary"
                          :for="'option_' + categoryIndex + '_' + questionIndex + '_3'">3</label>

                        <input type="radio" class="btn-check" :name="'btnradio_' + categoryIndex + '_' + questionIndex"
                          :id="'option_' + categoryIndex + '_' + questionIndex + '_4'"
                          v-model="selectedOptionGroups[categoryIndex][questionIndex]" :value="4">
                        <label class="btn btn-outline-primary"
                          :for="'option_' + categoryIndex + '_' + questionIndex + '_4'">4</label>

                        <input type="radio" class="btn-check" :name="'btnradio_' + categoryIndex + '_' + questionIndex"
                          :id="'option_' + categoryIndex + '_' + questionIndex + '_5'"
                          v-model="selectedOptionGroups[categoryIndex][questionIndex]" :value="'Nicht relevant'">
                        <label class="btn btn-outline-primary"
                          :for="'option_' + categoryIndex + '_' + questionIndex + '_5'">Nicht relevant</label>


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
    </div>
    <div class="d-grid gap-2 p-5 d-md-flex justify-content-md-center">
      <button class="btn btn-swn btn-lg" type="button" @click="sendAnswers">Senden</button>
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

const router = useRouter();
const route = useRoute();


const selectedWorker = ref('');
const questions = ref([]);
const selectedOptionGroups = ref([]);
const groupedQuestions = ref([]);

// Функция для отправки запроса на сервер с выбранными ответами
function sendAnswersToServer() {
  console.log("Вызвана функция sendAnswers");
  // Создание массива промисов для запросов
  const requests = [];

  // Перебор всех выбранных ответов
  for (let categoryIndex = 0; categoryIndex < selectedOptionGroups.value.length; categoryIndex++) {
    for (let questionIndex = 0; questionIndex < selectedOptionGroups.value[categoryIndex].length; questionIndex++) {
      const selectedValue = selectedOptionGroups.value[categoryIndex][questionIndex];
      const question = groupedQuestions.value[categoryIndex].questions[questionIndex];
      
      // Получение идентификатора вопроса и значения ответа
      const questionId = question.id;

      console.log(`Данные перед отправкой на сервер: questionId=${questionId}, answerValue=${selectedValue}`);
      
      // Добавление запроса в массив запросов
      const request = axios.post('/api/questions/answer_value', { question_id: questionId, answer_value: selectedValue, worker_name: selectedWorker });
      requests.push(request);
      console.log("Добавлен запрос:", request);
    }
  }

  // Ожидание выполнения всех запросов
  Promise.all(requests)
    .then(() => {
      // Если все ответы успешно сохранены, показываем сообщение об успехе
      Swal.fire({
        title: "Gesendet",
        confirmButtonColor: "#007684",
        text: "Danke für Teilnehmen",
        icon: "success"
      });
    })
    .catch(error => {
      // Если произошла ошибка при сохранении ответов, показываем сообщение об ошибке
      console.error('Error saving answers:', error);
      Swal.fire({
        icon: "error",
        title: "Fehler beim Speichern der Antworten.",
        text: "Bitte versuchen Sie es später erneut."
      });
    });
}

// Функция для обновления выбранного ответа
const updateSelectedOption = (categoryIndex, questionIndex, selectedValue) => {
  // Обновляем значение выбранного ответа в массиве selectedOptionGroups
  selectedOptionGroups.value[categoryIndex][questionIndex] = selectedValue;
  console.log(`Обновлен выбранный ответ: categoryIndex=${categoryIndex}, questionIndex=${questionIndex}, selectedValue=${selectedValue}`);
};

// Функция для проверки, все ли вопросы отвечены
function checkAllQuestionsAnswered() {
  // Проверяем, что все массивы выбранных ответов не пустые
  return selectedOptionGroups.value.every(category => category.length > 0);
}

// Функция для отправки ответов после проверки
function sendAnswers() {
  console.log("Вызвана функция sendAnswers");
  // Проверяем, все ли вопросы отвечены
  if (!checkAllQuestionsAnswered()) {
    Swal.fire({
      icon: "error",
      confirmButtonColor: "#007684",
      title: "Nicht alle Fragen sind beantwortet.",
      text: "Bitte beantworten Sie alle Fragen, bevor Sie fortfahren."
    });
    return;
  }
  if (!selectedWorker.value) {
      Swal.fire({
        icon: "error",
        confirmButtonColor: "#007684",
        title: "Bitte wählen Sie einen Mitarbeiter aus.",
        text: "Bitte wählen Sie einen Mitarbeiter aus, bevor Sie fortfahren."
      });
      return;
    }
  
  // Если все вопросы отвечены, выводим диалоговое окно для подтверждения отправки
  Swal.fire({
    title: "Möchten Sie die Antworten senden?",
    text: "Diese Aktion kann nicht rückgängig gemacht werden.",
    icon: "question",
    showCancelButton: true,
    confirmButtonColor: "#007684",
    cancelButtonColor: "#d33",
    cancelButtonText: "Abbrechen",
    confirmButtonText: "Ja, senden"
  }).then((result) => {
    // Если пользователь подтверждает отправку, отправляем ответы
    if (result.isConfirmed) {
      sendAnswersToServer();
    }
  });
}

// Функция для получения вопросов с сервера и группировки их по категориям
const fetchQuestions = () => {
  axios.get('/api/questions/question_text_and_description')
    .then(response => {
      questions.value = response.data;
      
      // Группировка вопросов по категориям
      const grouped = {};
      response.data.forEach(question => {
        if (!grouped[question.question_kategory]) {
          grouped[question.question_kategory] = [];
        }
        grouped[question.question_kategory].push(question);
      });
      groupedQuestions.value = Object.keys(grouped).map(key => ({ name: key, questions: grouped[key] }));
      console.log('Fetched questions:', questions.value);
      console.log('Grouped questions:', groupedQuestions.value);
      selectedOptionGroups.value = Array.from({ length: Object.keys(grouped).length }, () => []); // Инициализация массива выбранных ответов
      console.log('Selected option groups:', selectedOptionGroups.value);
    })
    .catch(error => {
      console.error('Error fetching questions:', error.response.data);
    });
};

onMounted(() => {
  fetchQuestions();
});
</script>

<script>
import HeaderLayout from '@/layouts/headerBig.vue';

export default {
  components: {
    HeaderLayout
  },

}
</script>
<style>
@import '../../../public/app.css';
</style>

