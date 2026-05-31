<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Userモデルと接続

/**
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $start_time
 * @property \Illuminate\Support\Carbon|null $end_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property int $status
 * @property-read mixed $overtime_minutes
 * @property-read mixed $salary_sum
 * @property-read User $user
 * @method static \Database\Factories\StartAndEndTimeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|StartAndEndTime newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StartAndEndTime newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StartAndEndTime query()
 * @method static \Illuminate\Database\Eloquent\Builder|StartAndEndTime whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StartAndEndTime whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StartAndEndTime whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StartAndEndTime whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StartAndEndTime whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StartAndEndTime whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StartAndEndTime whereUserId($value)
 * @mixin \Eloquent
 */
class StartAndEndTime extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'start_time', 'end_time', 'status'];
    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime'
    ];
    //出退勤の時刻はUserひとつというリレーション
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 毎日の出退勤の合計
    public function getSalarySumAttribute()
    {
        if (!$this->start_time || !$this->end_time) {
            return 0;
        }

        $min = $this->start_time->diffInMinutes($this->end_time);
        $hourly = $this->user->hourly_wage;

        // 8時間超えた分だけ残業にする
        $overTime = max(0, $min - 480);
        $normalSalary = floor(($min / 60) * $hourly);
        $overTimeBonus = floor(($overTime / 60) * $hourly * 0.25);

        return $normalSalary + $overTimeBonus;
    }

    public function getOvertimeMinutesAttribute()
    {
        $min = $this->start_time->diffInMinutes($this->end_time);
        return max(0, $min - 480);
    }
}
