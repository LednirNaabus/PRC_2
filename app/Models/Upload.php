<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'category',
        'comment',
        'url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'client_id','id');
    }
}
