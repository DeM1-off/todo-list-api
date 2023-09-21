<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    use HasFactory;

    protected $fillable
      = [
        'status',
        'priority',
        'title',
        'description',
        'user_id',
      ];

}
