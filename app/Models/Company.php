<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'zip',
        'contact_person',
        'telephone_number',
        'fax_number',          
        'mobile_number',
        'email',
    ];
}
