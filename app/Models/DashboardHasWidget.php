<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardHasWidget extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'dashboard_has_widgets';

    protected $fillable = [
        'dashboard_id',
        'widget_id'
    ];
}
