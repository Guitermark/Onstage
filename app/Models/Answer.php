<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['answer', 'question_id', 'assignment_id'];

    public function question():BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    public function assignment():BelongsTo
    {
        return $this->belongsTo(Assignment::class);
    }
}
