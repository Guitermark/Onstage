<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Assignment extends Model
{
    use HasFactory;

    public function company():BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function student1():BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function student2():BelongsTo
    {
        return $this->belongsTo(User::class, 'users2_id');
    }

    public function answers():HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
