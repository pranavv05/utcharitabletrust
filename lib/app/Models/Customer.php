<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Model
{
    use HasApiTokens, HasFactory, HasUuids;

    protected $guarded = ['id'];

    protected $fillable = [
        'customerId',
        'name',
        'email',
        'phone',
        'address',
        'bloodGroup',
        'type',
        'status'
    ];
}
