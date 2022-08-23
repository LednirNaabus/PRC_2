<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id', 'title', 'start', 'end'
    ];

    public function user() {
        
        return $this->hasOne(User::class,'id','client_id');
    }
}
