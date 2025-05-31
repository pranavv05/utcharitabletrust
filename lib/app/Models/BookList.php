<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Sanctum\HasApiTokens;

class BookList extends Model
{
    use HasApiTokens, HasFactory, HasUuids;

    protected $guarded = ['id'];

    protected $fillable = [
        'bookName',
        'author',
        'class',
        'bookImage',
        'utbn',
        'status',
        'addedDate',
        'customer_id'
    ];

    public function customer_data(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
