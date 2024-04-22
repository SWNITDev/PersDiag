<template>
  <HeaderLayout>
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
  </HeaderLayout>
</template>

<script>
import HeaderLayout from '@/layouts/headerBig.vue';
import axios from 'axios';

export default {
  components: {
    HeaderLayout
  },
  data() {
    return {
      years: [],
      selectedYear: '',
      questionsAndAnswers: []
    };
  },
  mounted() {
    this.fetchQuestionsAndAnswers();
  },
  computed: {
    filteredQuestionsAndAnswers() {
      if (!this.selectedYear) {
        return [];
      } else {
        return this.questionsAndAnswers.filter(item => {
          return item.year === parseInt(this.selectedYear);
        });
      }
    }
  },
  methods: {
    async fetchQuestionsAndAnswers() {
      try {
        const response = await axios.get('/api/questions_and_answers');
        this.questionsAndAnswers = response.data;
        // JahrWert bekommen
        this.years = [...new Set(this.questionsAndAnswers.map(item => item.year))];
      } catch (error) {
        console.error('Error fetching questions and answers:', error);
      }
    }
  }
};
</script>

<style scoped>
@import '../../../public/app.css';
</style>
