<?php

namespace App\Models;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'pd_id';
    protected $fillable = [
        'pd_code',
        'pd_ct_id',
        'pd_name',
        'pd_price',
    ];

    const CREATED_AT = 'pd_created_at';
    const UPDATED_AT = 'pd_updated_at';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->pd_code = IdGenerator::generate(['table' => 'products', 'field'=> 'pd_code' ,'length' => 6, 'prefix' =>'PD-']);
        });
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'pd_ct_id', 'ct_id');
    }
}
