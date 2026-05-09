<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Userモデルと接続

/**
 * @mixin IdeHelperStartAndEndTime
 */
class StartAndEndTime extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','start_time', 'end_time', 'status'];
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
}
