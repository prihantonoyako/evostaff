<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, HasUuids;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'menus';


    protected $fillable = [
        'parent_id',
        'name',
        'path',
        'description',
        'order',
        'icon',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    
}
