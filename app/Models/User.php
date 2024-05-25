<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $primaryKey = 'us_id';
    protected $fillable = [
        'us_name',
        'us_password',
        'us_email',
        'us_phone_number',
        'us_address',
    ];

    const CREATED_AT = 'us_created_at';
    const UPDATED_AT = 'us_updated_at';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'us_password',
    ];

    protected function casts(): array
    {
        return [
            'us_password' => 'hashed',
        ];
    }

}

