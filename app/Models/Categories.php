<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'ct_id';
    protected $fillable = [
        'ct_code',
        'ct_name'
    ];

    const CREATED_AT = 'ct_created_at';
    const UPDATED_AT = 'ct_updated_at';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->ct_code = IdGenerator::generate(['table' => 'categories', 'field'=> 'ct_code' ,'length' => 6, 'prefix' =>'CT-']);
        });
    }

}

