<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Content extends Model implements HasMedia
{ 
    use HasFactory, InteractsWithMedia;
    protected $guarded = [];
    protected $fillable = [
        'title', 'slug', 'description', 'type',
        'price', 'is_free', 'status', 'user_id',
        'is_active', 'path',
       
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function purchases():HasMany
    {
        return $this->hasMany(Purchase::class);
    }

    public function ratings():HasMany
    {
        return $this->hasMany(Rating::class);

    }
        public function registerMediaCollections(): void
        {
            if ($this->type === 'article') {
                $this->addMediaCollection('images')->useFallbackUrl('/images/default.jpg');
            } else {
                $this->addMediaCollection('media')->singleFile();
            }
        }
}
