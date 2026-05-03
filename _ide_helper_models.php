<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @mixin IdeHelperStartAndEndTime
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $start_time
 * @property \Illuminate\Support\Carbon|null $end_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\StartAndEndTimeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|StartAndEndTime newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StartAndEndTime newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StartAndEndTime query()
 * @method static \Illuminate\Database\Eloquent\Builder|StartAndEndTime whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StartAndEndTime whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StartAndEndTime whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StartAndEndTime whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StartAndEndTime whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StartAndEndTime whereUserId($value)
 */
	class StartAndEndTime extends \Eloquent {}
}

namespace App\Models{
/**
 * @mixin IdeHelperUser
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $hourly_wage
 * @property int $salary_sum
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\StartAndEndTime> $works
 * @property-read int|null $works_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereHourlyWage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSalarySum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

