<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['answer_value', 'question_id', 'worker_name', 'date'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    public $timestamps = false;


}