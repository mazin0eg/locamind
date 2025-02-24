<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'question_id', 'body'];

    public function question()
{
    return $this->belongsTo(Question::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}

}
