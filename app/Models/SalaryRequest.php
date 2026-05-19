<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

/**
 * @property int $id
 * @property int $user_id
 * @property int $before_salary
 * @property int $after_salary
 * @property string $reason
 * @property string $status
 * @property int|null $approved_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User $user
 * @method static \Database\Factories\SalaryRequestFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryRequest whereAfterSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryRequest whereApprovedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryRequest whereBeforeSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryRequest whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryRequest whereUserId($value)
 * @mixin \Eloquent
 */
class SalaryRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'before_salary',
        'after_salary',
        'reason',
        'status',
        'approved_by'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
