<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class Booking extends Model
{
    use HasApiTokens, HasFactory, HasUuids;

    protected $guarded = ['id'];

    protected $fillable = [
        'orderNo',
        'issueDate',
        'endDate',
        'returnDate',
        'penaltyAmount',
        'penaltyReason',
        'ref_orderNo',
        'customer_id',
        'status'
    ];

    public function customer_data(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function book_data(): HasMany
    {
        return $this->hasMany(BookingItem::class, 'booking_id', 'id');
    }

    public function book(): BelongsTo
    {
        return $this->belongsTo(BookList::class, 'book_id', 'id');
    }
}
