<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHasRole extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_has_roles';

    protected $fillable = [
        'user_id',
        'role_id',
        'created_by',
        'deleted_by',
        'created_at',
        'deleted_at'
    ];
}
