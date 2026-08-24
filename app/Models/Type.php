<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\Task;

/**
 * @property int $id
 * @property string $type_name
 * @property int $projects_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Type newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Type newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Type query()
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereProjectsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereTypeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereUpdatedAt($value)
 * @property string $type_color
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereTypeColor($value)
 * @mixin \Eloquent
 */
class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'type_name',
        'projects_id',
        'type_color'
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
