<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Question;

class QuestionController extends Controller
{
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
    public function showQuestionTextAndDescription($id)
    {
        $question = Question::find($id);
        if (!$question) {
            return response()->json(['message' => 'Question not found'], 404);
        }

        return response()->json([
            'question_text' => $question->question_text,
            'question_description' => $question->question_description
        ]);
    }
    public function showAllQuestionsTextAndDescription()
{
    $questions = Question::all(['question_text', 'question_description']);
    return response()->json($questions);
}


}

