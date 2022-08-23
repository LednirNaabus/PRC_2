<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_type', 
        'category', 
        'sub_category', 
        'group_category',
        'question',
        'required',
        'option_1',
        'option_2',
        'option_3',
        'option_4',
        'option_5',
        'option_6',
        'option_7',
        'option_8',
        'score_1',
        'score_2',
        'score_3',
        'score_4',
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    
}
