<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasTenants;
use Filament\Panel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Collection;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\HasName;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
 

class User extends Authenticatable implements FilamentUser, Hastenants
{
    use HasApiTokens, HasFactory, Notifiable;
    use LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',         // Menambahkan kolom role
        'avatar',       // Menambahkan kolom avatar
        'branch_code',  // Menambahkan kolom branch_code
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(
            [
                'name',
                'email',
                'password',
                'role',         // Menambahkan kolom role
                'avatar',       // Menambahkan kolom avatar
                'branch_code',  // Menambahkan kolom branch_code
            ]
        );
    }
    public function canAccessPanel(Panel $panel): bool
    {
        // Ganti dengan logika Anda sendiri untuk menentukan akses
        return str_ends_with($this->email, '@bankserang.com');
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class);
    }
 
    public function getTenants(Panel $panel): Collection
    {
        return $this->teams;
    }
 
    public function canAccessTenant(Model $tenant): bool
    {
        return $this->teams()->whereKey($tenant)->exists();
    }

    public function getFilamentName(): string
    {
        return $this->name;
    }

    public function kantorCabang()
    {
        return $this->belongsTo(KantorCabang::class, 'cab');
    }
}
