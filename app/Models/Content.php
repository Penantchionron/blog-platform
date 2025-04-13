<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Content extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title', 'slug', 'description', 'type',
        'price', 'is_free', 'status', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    public function averageRating()
    {
        return $this->ratings()->avg('rating');
    }
}
