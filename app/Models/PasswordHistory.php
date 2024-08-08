<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordHistory extends Model
{
    use HasFactory, HasUuids;

	const UPDATED_AT = null;

    protected $table = 'password_histories';

    protected $fillable = [
		'id_user',
		'password',
	];

	protected $hidden = [
		'password',
	];
}
