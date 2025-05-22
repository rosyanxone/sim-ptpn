<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FertilizationStock extends Model
{
    use SoftDeletes;

    protected $guarded = [];
}
