<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class QuestionRepository
{
    /*
    @var \Illuminate\Database\Eloquent\Model
     */
    protected $modelQuestion;
    protected $modelAnswer;

    /*
    @param \App\Models\Question $question
    @param \App\Models\Answer $answer
     */
    public function __construct(Question $question, Answer $answer)
    {
        $this->modelQuestion = $question;
        $this->modelAnswer = $answer;
    }

    public function funcStore($questionId, $answerValue, $workerName)
    {
        $currentDateTime = Carbon::now();
       // $date = Carbon::create(2023, 1, 1); //für Testfall

        // Antwort in der Datenbank speichern
        $savedAnswer = $this->modelAnswer->create([
            'question_id' => $questionId,
            'answer_value' => $answerValue,
            'worker_name' => $workerName,
            'date' => $currentDateTime,
            //'date' => $date, //für Testfall
        ]);

        return $savedAnswer;

    }

    public function getQuestionsAndAnswers()
    {
        return DB::table('questions')
            ->join('answers', 'questions.id', '=', 'answers.question_id')
            ->select(
                'questions.id as question_id',
                'questions.question_text',
                'questions.question_description',
                'answers.answer_value',
                'answers.worker_name',
                DB::raw('YEAR(answers.date) as year')
            )
            ->orderBy('question_id', 'asc')
            ->get();
    }
}

