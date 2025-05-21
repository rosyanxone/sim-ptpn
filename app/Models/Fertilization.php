<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fertilization extends Model
{
    /** @use HasFactory<\Database\Factories\FertilizationFactory> */
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

    public function fertilizer()
    {
        return $this->belongsTo(FertilizationStock::class, 'fertilization_stock_id');
    }
}
