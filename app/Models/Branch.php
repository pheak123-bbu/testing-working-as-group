<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use SoftDeletes;
    protected $table = 'branches';
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',

    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts():array{
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
