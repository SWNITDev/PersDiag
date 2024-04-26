<?php

namespace App\Repositories;

use App\Models\Action;
use App\Models\Answer;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class QuestionRepository
{
    /*
    @var \Illuminate\Database\Eloquent\Model
     */
    protected $modelQuestion;
    protected $modelAnswer;
    protected $modelAction;

    /*
    @param \App\Models\Question $question
    @param \App\Models\Answer $answer
     */
    public function __construct(Question $question, Answer $answer, Action $action)
    {
        $this->modelQuestion = $question;
        $this->modelAnswer = $answer;
        $this->modelAction = $action;
    }

    public function funcStore($questionId, $answerValue, $workerName, $activName)
    {
        $currentDateTime = Carbon::now();
        // $date = Carbon::create(2023, 1, 1); //für Testfall

        // Antwort in der Datenbank speichern
        $savedAnswer = $this->modelAnswer->create([
            'question_id' => $questionId,
            'answer_value' => $answerValue,
            'worker_name' => $workerName,
            'activ_name' => $activName,
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
                'answers.activ_name',
                DB::raw('YEAR(answers.date) as year')
            )
            ->orderBy('question_id', 'asc')
            ->get();
    }

    public function saveActionStore($questionId, $actionText, $workerName, $executeDate)
    {
        {
            $currentDateTime = Carbon::now();
            // Aktion in der Datenbank speichern
            $savedAction = $this->modelAction->create
                ([
                'question_id' => $questionId,
                'action_text' => $actionText,
                'worker_name' => $workerName,
                'execute_date' => $executeDate,
                'date' => $currentDateTime,
            ]);
        }

    }
    public function getAnswersAndActions()
    {
        return DB::table('questions')
            ->leftJoin('answers', 'questions.id', '=', 'answers.question_id')
            ->leftJoin('actions', 'questions.id', '=', 'actions.question_id')
            ->select(
                'questions.id as question_id',
                'questions.question_text',
                'answers.answer_value',
                'answers.worker_name',
                DB::raw("IFNULL(actions.action_text, '') as action_text"),
                DB::raw("IFNULL(actions.execute_date, '') as execute_date"),
                DB::raw('YEAR(answers.date) as year')
            )
            ->orderBy('questions.id', 'asc')
            ->get();
    }

}
