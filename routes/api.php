<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
/*
Route::group(['prefix' => 'v1'], funktion()[
Route::apiResource('questions', QuestionController::class)
]);
*/

/*Route::prefix('v1')->group(function () {
    Route::apiResource('questions', QuestionController::class)->names([
        'store' => 'create_question',
        'update' => 'edit_question',
    ]);
});*/


Route::prefix('questions')->group(function () {
    Route::get('/question_text/{id}', [QuestionController::class, 'showQuestionText']);
    Route::get('/question_description/{id}', [QuestionController::class, 'showQuestionDescription']);
    Route::get('/question_text_and_description/{id}', [QuestionController::class, 'showQuestionTextAndDescription']);
    Route::get('/question_text_and_description', [QuestionController::class, 'showAllQuestionsTextAndDescription']);

    Route::post('/', [QuestionController::class, 'store']);
    Route::put('/{id}', [QuestionController::class, 'update']);
    Route::delete('/{id}', [QuestionController::class, 'destroy']);

    Route::get('/answer_value', [QuestionController::class, 'saveAnswer']);
    Route::post('/answer_value', [QuestionController::class, 'saveAnswer']);
});
Route::get('/questions_and_answers', [QuestionController::class, 'getQuestionsAndAnswers']);
Route::post('/actions', [QuestionController::class, 'saveAction']);
Route::get('/actions', [QuestionController::class, 'saveAction']);
Route::get('/answers_and_actions', [QuestionController::class, 'getAnswersAndActions']);

