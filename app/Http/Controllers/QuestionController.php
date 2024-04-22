<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Question;
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
        $questions = Question::all(['question_text', 'question_description', 'id']);
        return response()->json($questions);
    }

    public function saveAnswer(Request $request)
    {
        $questionId = $request->input('question_id');
        $answerValue = $request->input('answer_value');
        $workerName = 'testworker'; // Standardwert für den Namen des Mitarbeiters setzen

        // Antwort mit Hilfe des Repositories speichern
        $savedAnswer = $this->questionRepository->funcStore($questionId, $answerValue, $workerName);

        // Erfolgreiche Antwort zurückgeben
        return response()->json(['message' => 'Answer saved successfully', 'data' => $savedAnswer], 200);

    }

    public function getQuestionsAndAnswers() {
        // Вызов метода getQuestionsAndAnswers из репозитория
        $questionsAndAnswers = $this->questionRepository->getQuestionsAndAnswers();
        
        return $questionsAndAnswers;
    }
    
}
