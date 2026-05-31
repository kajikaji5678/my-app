<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\Task;

/**
 * @property int $id
 * @property string $milestone_name
 * @property string|null $start_time
 * @property string|null $end_time
 * @property int $project_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Milestone newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Milestone newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Milestone query()
 * @method static \Illuminate\Database\Eloquent\Builder|Milestone whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Milestone whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Milestone whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Milestone whereMilestoneName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Milestone whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Milestone whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Milestone whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
