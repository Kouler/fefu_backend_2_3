<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appeal extends Model
{
    use HasFactory;

    protected  $fillable = [
        'name',
        'phone',
        'email',
        'message'
    ];
//$table->id();
//$table->string('name', 20);
//$table->string('phone', 11)->nullable();
//$table->string('email', 100)->nullable();
//$table->string('message');
//
//$table->timestamps();
}
