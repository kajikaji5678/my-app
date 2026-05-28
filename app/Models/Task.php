<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\Category;
use App\Models\Type;
use App\Models\Milestone;
use App\Models\User;
use App\Models\Role;
use App\Models\Status;

class Task extends Model
{
    use HasFactory;

    //* CRUDでテーブル名あるのにエラー出てきたなら$fillableが抜けてる可能性
    protected $fillable = [
        'id',
        'task_name',
        'project_id',
        'category_id',
        'type_id',
        'milestone_id',
        'status',
        'status_color',
        'status_id'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function milestone()
    {
        return $this->belongsTo(Milestone::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function statuses() {
        return $this->belongsTo(Status::class);
    }
}
