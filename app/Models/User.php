<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable, HasUuids;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'username',
		'email',
		'password',
		'email_verified_at',
		'status',
		'fail_login_attempt',
	];

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array<int, string>
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * The attributes that should be cast.
	 *
	 * @var array<string, string>
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
		'password' => 'hashed',
		'status' => 'int'
	];

	public function getStatusAttribute($value) {
		$statusData = [
			0 => 'Inactive',
			1 => 'Active',
			2 => 'Lock'
		];

		if(!isset($statusData[$value])) {
			throw new \Exception("No content", 204);
		}

		return $statusData[$value];
	}

	public function employee(): HasOne
	{
		return $this->hasOne(Employee::class, 'user_id', 'id');
	}

	public function roles(): HasMany
	{
		return $this->hasMany(Role::class, 'user_id', 'id');
	}
}
