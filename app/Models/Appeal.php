<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appeal extends Model
{
    use HasFactory;

    protected  $fillable = [
        'name',
        'surname',
        'patronymic',
        'age',
        'gender',
        'phone',
        'email',
        'message'
    ];
    
    protected $table = 'appeal';
}
