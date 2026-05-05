<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class SalaryRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'before_salary',
        'after_salary',
        'reason',
        'status',
        'approved_by'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
