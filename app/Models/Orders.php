<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'or_id';
    protected $fillable = [
        'or_pd_id',
        'or_amount',
    ];

    const CREATED_AT = 'or_created_at';
    const UPDATED_AT = 'or_updated_at';

    public function product()
    {
        return $this->belongsTo(Products::class, 'or_pd_id', 'pd_id');
    }
}
