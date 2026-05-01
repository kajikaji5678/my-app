<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class start_and_end_time extends Model
{
    use HasFactory;
    protected $fillable = ['start_time', 'end_time'];
}
