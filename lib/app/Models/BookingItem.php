<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Sanctum\HasApiTokens;

class BookingItem extends Model
{
    use HasApiTokens, HasFactory, HasUuids;

    protected $guarded = ['id'];

    protected $fillable = [
        'orderNo',
        'booking_id',
        'book_id',
        'status',
    ];

    public function book(): BelongsTo
    {
        return $this->belongsTo(BookList::class, 'book_id', 'id');
    }

}
