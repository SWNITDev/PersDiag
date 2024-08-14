<template>
  <HeaderLayout>
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="nav">
            <h2 class="info">Meine Bewertungen</h2>
          </div>
          <div class="space"></div>
          <div class="col-md-4">
            <label for="inputState" class="form-label">Wähle Jahr aus:</label>
            <select v-model="selectedYear" class="form-select">
              <option value="">Wähle...</option>
              <option v-for="year in years" :key="year">{{ year }}</option>
            </select>
          </div>
          <div class="space"></div>
          <div>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Nr</th>
                  <th scope="col">Frage</th>
                  <th scope="col">Frage Beschreibung</th>
                  <th scope="col">Antwort</th>
                  <th scope="col">Arbeiter testSpalte</th>
                  <th scope="col">Jahr testSpalte</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(item, index) in filteredQuestionsAndAnswers" :key="index">
                  <th scope="row">{{ item.question_id }}</th>
                  <td>{{ item.question_text }}</td>
                  <td>{{ item.question_description }}</td>
                  <td>{{ item.answer_value }}</td>
                  <td>{{ item.worker_name }}</td>
                  <td>{{ item.year }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </HeaderLayout>
</template>

<script>
import HeaderLayout from '@/layouts/headerBig.vue';
import axios from 'axios';
import { ref, onMounted, computed } from 'vue';

export default {
  components: {
    HeaderLayout
  },
  setup() {
    const years = ref([]);
    const selectedYear = ref('');
    const questionsAndAnswers = ref([]);
    const activeName = ref('');

    const fetchUserName = async () => {
      try {
        const response = await axios.get('/user/manager');
        activeName.value = response.data.userName;
      } catch (error) {
        console.error('Error fetching activeName:', error);
      }
    };

    const fetchQuestionsAndAnswers = async () => {
      try {
        const response = await axios.get('/api/questions_and_answers');
        questionsAndAnswers.value = response.data;
        // JahrWert bekommen
        years.value = [...new Set(questionsAndAnswers.value.map(item => item.year))];
      } catch (error) {
        console.error('Error fetching questions and answers:', error);
      }
    };

    const filteredQuestionsAndAnswers = computed(() => {
      if (!selectedYear.value) {
        return [];
      } else {
        return questionsAndAnswers.value.filter(item => {
          return item.year === parseInt(selectedYear.value) && item.worker_name === activeName.value;
        });
      }
    });

    onMounted(() => {
      fetchQuestionsAndAnswers();
      fetchUserName();
    });

    return {
      years,
      selectedYear,
      questionsAndAnswers,
      activeName,
      filteredQuestionsAndAnswers
    };
  }
};
</script>

<style scoped>
@import '../../../public/app.css';
</style>
