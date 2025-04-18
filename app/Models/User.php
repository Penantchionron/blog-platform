<?php

 namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasRoles;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = [];
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'phone',
        'country',
        'password',
        'avatar',
        'provider',
        'provider_id',
        'role',
        'is_premium',
        'premium_expires_at',
        'is_active',
    ]; 
   

                public function hasRole($role)
                {
                    return $this->role === $role;
                }
                public function contents():HasMany
            {
                return $this->hasMany(Content::class);
            }

            public function purchases():HasMany
            {
                return $this->hasMany(Purchase::class);
            }

            public function ratings():HasMany
            {
                return $this->hasMany(Rating::class);
            }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}