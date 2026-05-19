<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

/**
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $date
 * @property string|null $start_time
 * @property string|null $end_time
 * @property-read User $user
 * @method static \Database\Factories\SchedulesFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Schedules newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Schedules newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Schedules query()
 * @method static \Illuminate\Database\Eloquent\Builder|Schedules whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedules whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedules whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedules whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedules whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedules whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedules whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedules whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedules whereUserId($value)
 * @mixin \Eloquent
 */
class Schedules extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'id', 'user_id', 'date', 'start_time', 'end_time', 'status'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
