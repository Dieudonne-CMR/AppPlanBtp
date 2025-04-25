<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Ajouter 'role' ici
    ];

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

    /**
     * Les entreprises gérées par cet utilisateur (Gérant).
     */
    public function entreprises(): BelongsToMany
    {
        // Le nom de la table pivot est déduit (entreprise_user)
        // Si différent, le spécifier en 2e argument
        // Si les clés étrangères sont différentes, spécifier en 3e et 4e
        return $this->belongsToMany(Entreprise::class, 'entreprise_user');
    }

     // Méthodes pratiques pour vérifier les rôles
     public function isSuperAdmin(): bool
     {
         return $this->role === 'super_admin';
     }
 
     public function isGerant(): bool
     {
         return $this->role === 'gerant';
     }
}
