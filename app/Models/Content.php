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
    use HasFactory;
    use InteractsWithMedia;

    protected $guarded = [];

    protected $fillable = [
        'title', 'slug', 'description', 'type',
        'price', 'is_free', 'status', 'user_id',
        'is_active', 'path',
    ];

    /**
     * Définir la relation avec l'utilisateur.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Définir la relation avec les achats.
     */
    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }

    /**
     * Définir la relation avec les évaluations.
     */
    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }

    /**
     * Enregistrer les collections de médias selon le type de contenu.
     */
    public function registerMediaCollections(): void
    {
        // Si le type de contenu est 'articles', ajouter une collection pour les images.
        if ($this->type === 'articles') {
            $this->addMediaCollection('images')
                ->useFallbackUrl('/images/default.jpg')  // URL de secours pour les images.
                ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/gif']);  // Types MIME acceptés.
        } else {
            // Pour les autres types, on gère une collection de médias avec un seul fichier.
            $this->addMediaCollection('media')
                ->singleFile();  // Cette collection n'acceptera qu'un seul fichier.
        }
    }

    /**
     * Ajouter un média à la collection appropriée.
     */
    public function addMediaToContent($mediaFile)
    {
        // Vérifiez si le type de contenu est 'articles'
        if ($this->type === 'articles') {
            $this->addMedia($mediaFile)->toMediaCollection('images');
        } else {
            $this->addMedia($mediaFile)->toMediaCollection('media');
        }
    }

    /**
     * Récupérer l'URL du premier média de la collection 'images' ou 'media'.
     */
    public function getFirstMediaUrl()
    {
        if ($this->type === 'articles') {
            return $this->getFirstMediaUrl('images') ?? '/images/default.jpg';
        } else {
            return $this->getFirstMediaUrl('media');
        }
    }
}
