<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Purchase extends Model
{
    use HasFactory;
    
     // Define all attributes that can be mass assigned
     protected $fillable = [
        'user_id',
        'content_id',
        'price',
        'payment_method',
        'transaction_id',
        'purchased_at',
    ];
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function content(): BelongsTo
    {
        return $this->belongsTo(Content::class);
    }
}

