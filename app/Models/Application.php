<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_type', 
        'user_id', 
        'question_id', 
        'answer',
        'option',
        'option_',
        'score',
        'url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question() {
        
        return $this->hasOne(Question::class,'id','question_id');
    }
}
