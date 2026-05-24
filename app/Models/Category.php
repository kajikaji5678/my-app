<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\Task;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'category_name',
        'project_id',
    ];

    public function project()
    {
        $this->belongsTo(Project::class);
    }

    public function task() {
        $this->hasMany(Task::class);
    }
}
