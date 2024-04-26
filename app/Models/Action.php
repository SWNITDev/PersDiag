<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Action extends Model
{
    use HasFactory;

    protected $fillable = ['action_text', 'execute_date', 'date', 'question_id', 'worker_name'];
    
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    public $timestamps = false;

}