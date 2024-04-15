<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Answer;
use App\Models\Question;

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

        // Antwort in der Datenbank speichern
        $savedAnswer = $this->modelAnswer->create([
            'question_id' => $questionId,
            'answer_value' => $answerValue,
            'worker_name' => $workerName,
            'date' => $currentDateTime,
        ]);

        return $savedAnswer;

    }
}
