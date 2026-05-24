<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\Task;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'type_name',
        'projects_id'
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
