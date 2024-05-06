<template>
  <HeaderLayout>
  </HeaderLayout>
  <div class="container-fluid flex-shrink-0">
      <div class="container">
        <div class="space"></div>
    <h1>Fragen verwalten</h1>
    
    <!-- Formular zum Hinzufügen einer neuen Frage -->
    <div v-if="!editingQuestion && !addingNewQuestion">
      <button class="btn btn-swn btn-lg" @click="addNewQuestion"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
</svg>Frage hinzufügen</button>
    </div>
    
    <!-- Formular zum Bearbeiten einer Frage -->
    <div v-if="editingQuestion">
      <h2>Frage bearbeiten</h2>
      <input v-model="editedQuestion.question_text" placeholder="Frage">
      <textarea v-model="editedQuestion.question_description" placeholder="Beschreibung"></textarea>
      <button class="btn btn-swn btn-lg" @click="saveEditedQuestion">Speichern</button>
    </div>
    
    <!-- Liste aller Fragen -->
    <div v-if="!editingQuestion && !addingNewQuestion">
      <h2>Alle Fragen</h2>
      <div class="row" v-for="question in questions" :key="question.id">
        <div class="col">
          {{ question.question_text }}
        </div>
        <div class="col">{{ question.question_description }}</div>
        <div class="col">  <button class="btn btn-swn btn-lg" @click="editQuestion(question)"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"></path>
</svg> Bearbeiten</button>
        <button class="btn btn-swn btn-lg" @click="deleteQuestion(question.id)"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
  <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
</svg> Löschen</button></div>
        
      </div>
    </div>
    
    <!-- Formular zum Hinzufügen einer neuen Frage -->
    <div v-if="addingNewQuestion">
      <h2>Neue Frage hinzufügen</h2>
      <input v-model="newQuestion.question_text" placeholder="Frage">
      <textarea v-model="newQuestion.question_description" placeholder="Beschreibung"></textarea>
      <button class="btn btn-swn btn-lg" @click="saveNewQuestion"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
  <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
</svg> Speichern</button>
    </div>
  </div>
</div>
</template>

<script>
import axios from 'axios';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import HeaderLayout from '@/layouts/header.vue';

export default {
  components: {
    HeaderLayout
  },
  data() {
    return {
      questions: [],
      editingQuestion: null,
      addingNewQuestion: false,
      editedQuestion: {
        question_text: '',
        question_description: ''
      },
      newQuestion: {
        question_text: '',
        question_description: ''
      }
    };
  },
  mounted() {
    axios.get('/api/questions/question_text_and_description')
      .then(response => {
        this.questions = response.data;
      })
      .catch(error => {
        console.error('Fehler beim Abrufen der Fragen:', error.response.data);
      });
  },
  methods: {
    editQuestion(question) {
      this.editingQuestion = question.id;
      this.editedQuestion = { ...question };
    },
    saveEditedQuestion() {
      // Hier API-Anfrage machen, um die bearbeitete Frage zu speichern
      axios.put(`/api/questions/${this.editedQuestion.id}`, this.editedQuestion)
    .then(response => {
      // Erfolgreich aktualisiert, setze editingQuestion zurück
      this.editingQuestion = null;
    })
    .catch(error => {
      console.error('Fehler beim Speichern der bearbeiteten Frage:', error.response.data);
    });
    },
    addNewQuestion() {
      this.addingNewQuestion = true;
    },
    saveNewQuestion() {
      axios.post('/api/questions', this.newQuestion)
    .then(response => {
      // Erfolgreich hinzugefügt, setze addingNewQuestion zurück und leere das Formular
      this.addingNewQuestion = false;
      this.newQuestion = { question_text: '', question_description: '' };
    })
    .catch(error => {
      console.error('Fehler beim Speichern der neuen Frage:', error.response.data);
    });
    },
    deleteQuestion(id) {
  axios.delete(`/api/questions/${id}`)
    .then(response => {
      // Erfolgreich gelöscht, entferne die Frage aus der Liste
      this.questions = this.questions.filter(question => question.id !== id);
    })
    .catch(error => {
      console.error('Fehler beim Löschen der Frage:', error.response.data);
    });
}
  }
}
</script>

<style scoped>
@import '../../../public/app.css';
</style>

