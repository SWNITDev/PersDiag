<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Question extends Model
{
    use HasFactory;

    protected $fillable = ['question_text', 'question_description'];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

}