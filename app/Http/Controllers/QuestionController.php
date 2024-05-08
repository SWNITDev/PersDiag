<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Question;
use App\Models\Action;
use App\Repositories\QuestionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    protected $questionRepository;

    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function showQuestionText($id)
    {
        $question = Question::find($id);
        if (!$question) {
            return response()->json(['message' => 'Question not found'], 404);
        }

        return response()->json(['question_text' => $question->question_text]);
    }

    public function showQuestionDescription($id)
    {
        $question = Question::find($id);
        if (!$question) {
            return response()->json(['message' => 'Question not found'], 404);
        }

        return response()->json(['question_description' => $question->question_description]);
    }

    public function showAllQuestionsTextAndDescription()
    {
        $questions = Question::all(['question_text', 'question_description', 'question_kategory', 'id']);
        return response()->json($questions);
    }

    public function saveAnswer(Request $request)
{
    $questionId = $request->input('question_id');
    $answerValue = $request->input('answer_value');
    $workerName = $request->input('worker_name'); 
    $activName = $request->input('aktiv_name');
    
    // Wenn $workerName nicht übergeben wurde, wird $activName als Standardwert verwendet.
    if (!$workerName) {
        $workerName = $activName;
    }
    
    // Antwort mit Hilfe des Repositories speichern
    $savedAnswer = $this->questionRepository->funcStore($questionId, $answerValue, $workerName, $activName);

    // Erfolgreiche Antwort zurückgeben
    return response()->json(['message' => 'Answer saved successfully', 'data' => $savedAnswer], 200);
}


    public function getQuestionsAndAnswers() {
        // Aufrufen der Methode getQuestionsAndAnswers aus dem Repository
        $questionsAndAnswers = $this->questionRepository->getQuestionsAndAnswers();
        
        return $questionsAndAnswers;
    }

    public function saveAction(Request $request)
    {
        // Prüfen, ob es Pflichtfelder gibt
        $requiredFields = ['question_id', 'action_text', 'execute_date', 'worker_name'];
        foreach ($requiredFields as $field) {
            if (!$request->has($field)) {
                return response()->json(['message' => 'Missing required field: ' . $field], 400);
            }
        }
        $executeDate = date('Y-m-d H:i:s', strtotime($request->input('execute_date')));
        $questionId = $request->input('question_id');
        $actionText = $request->input('action_text');
        $workerName = $request->input('worker_name');; // Standardwert für den Namen des Mitarbeiters setzen
       
        // Antwort mit Hilfe des Repositories speichern
        $savedAction = $this->questionRepository->saveActionStore($questionId, $actionText, $workerName, $executeDate);

        // Erfolgreiche Antwort zurückgeben
        return response()->json(['message' => 'Answer saved successfully', 'data' => $savedAction], 200);
        }

        public function getAnswersAndActions(){
            $answersAndActions = $this->questionRepository->getAnswersAndActions();
        
        return $answersAndActions;
        }

        public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'question_text' => 'required',
            'question_description' => 'required',
            'question_kategory' => 'required',
        ]);

        // Create a new question
        $question = Question::create($validatedData);

        return response()->json(['message' => 'Question created successfully', 'question' => $question], 201);
    }

    public function update(Request $request, $id)
    {
        // Find the question by ID
        $question = Question::find($id);
        if (!$question) {
            return response()->json(['message' => 'Question not found'], 404);
        }

        // Validate the request
        $validatedData = $request->validate([
            'question_text' => 'required',
            'question_description' => 'required',
        ]);

        // Update the question
        $question->update($validatedData);

        return response()->json(['message' => 'Question updated successfully', 'question' => $question]);
    }

    public function destroy($id)
    {
        // Find the question by ID
        $question = Question::find($id);
        if (!$question) {
            return response()->json(['message' => 'Question not found'], 404);
        }

        // Delete the question
        $question->delete();

        return response()->json(['message' => 'Question deleted successfully']);
    }

    }

