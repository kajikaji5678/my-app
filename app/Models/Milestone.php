<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\Task;

class Milestone extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'milestone_name',
        'start_time',
        'end_time'
    ];

    public function project()
    {
        $this->belongsTo(Project::class);
    }

    public function task()
    {
        $this->hasMany(Task::class);
    }
}
