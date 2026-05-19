<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

/**
 * @property int $id
 * @property int $user_id
 * @property string $start_date
 * @property string $end_date
 * @property string $days
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User $user
 * @method static \Database\Factories\PtoRequestFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|PtoRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PtoRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PtoRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|PtoRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PtoRequest whereDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PtoRequest whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PtoRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PtoRequest whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PtoRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PtoRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PtoRequest whereUserId($value)
 * @mixin \Eloquent
 */
class PtoRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'start_date',
        'end_date',
        'days',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
