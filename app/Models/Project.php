<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;
use App\Models\Category;
use App\Models\Type;
use App\Models\Milestone;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'projects_name',
        'id',
        'projects_key'
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function type() {
        return $this->hasMany(Type::class);
    }

    public function Milestone() {
        return $this->hasMany(Milestone::class);
    }
}
