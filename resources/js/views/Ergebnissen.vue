<template>
  <HeaderLayout>
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="nav">
            <h2 class="info">Meine Ergebnissen</h2>
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
                  <th scope="col">Antwort Mitarbeiter</th>
                  <th scope="col">Antwort Vorgesetzter</th>
                  <th scope="col">Massnahme</th>
                  <th scope="col">Erfühlen bis</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(item, index) in filteredAnswersAndActions" :key="index">
                  <th scope="row">{{ item.question_id }}</th>
                  <td>{{ item.question_text }}</td>
                  <td>{{ item.answer_value }}</td>
                  <td>Antwort Vorgesetzter</td>
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
      AnswersAndActions: []
    };
  },
  mounted() {
    this.fetchAnswersAndActions();
  },
  computed: {
    filteredAnswersAndActions() {
      if (!this.selectedYear) {
        return [];
      } else {
        return this.AnswersAndActions.filter(item => {
          return item.year === parseInt(this.selectedYear);
        });
      }
    }
  },
  methods: {
    async fetchAnswersAndActions() {
      try {
        const response = await axios.get('/api/answers_and_actions');
        this.AnswersAndActions = response.data;
        // JahrWert bekommen
        this.years = [...new Set(this.AnswersAndActions.map(item => item.year))];
      } catch (error) {
        console.error('Error fetching actions and answers:', error);
      }
    }
  }
};
</script>

<style scoped>
@import '../../../public/app.css';
</style>
