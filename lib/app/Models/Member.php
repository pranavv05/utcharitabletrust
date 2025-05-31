<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Member extends Model
{
    use HasApiTokens, HasFactory, HasUuids;

    protected $guarded = ['id'];

    protected $fillable = [
        'memberId',
        'name',
        'email',
        'phone',
        'bloodgroup',
        'address',
        'city',
        'purpose',
        'status',
    ];
}
