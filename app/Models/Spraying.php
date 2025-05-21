<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spraying extends Model
{
    /** @use HasFactory<\Database\Factories\SprayingFactory> */
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function land()
    {
        return $this->belongsTo(Land::class);
    }

    public function pesticide()
    {
        return $this->belongsTo(PesticideStock::class, 'pesticide_stock_id');
    }
}
