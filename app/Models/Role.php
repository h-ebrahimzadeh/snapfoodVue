<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public $timestamps = false;

    public const IS_USER=1;
    public const IS_ADMIN=2;
    public const IS_SELLER=3;

    protected $fillable=[
        'name'
    ];

}