<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
        'is_admin',
        'role_id',
        'organization_id'
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
     * Get the user's role id.
     */
    public function roleId(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => session('organization_role_id') ? session('organization_role_id') : $attributes['role_id'],
        );
    }

    /**
     * check the user is admin or not.
     */
    public function isAdmin(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => $attributes['role_id'] == 2,
        );
    }

    /**
     * check the user is publisher or not.
     */
    public function isPublisher(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => $attributes['role_id'] == 3,
        );
    }

    /**
     * The organizations that belong to the user.
     */
    public function organizations(): BelongsToMany
    {
        return $this->belongsToMany(User::class,
            'organization_user',
            'user_id',
            'organization_id')->withPivot(['role_id']);
    }

    /**
     * Get the user's organization id.
     */
    public function getOrganizationIdAttribute()
    {
        if (session('organization_id')) {
            return session('organization_id');
        }

        $organization = $this->organizations()->first();
        if ($organization) {
            session([
                'organization_id' => $organization->id,
                'organization_name' => $organization->name,
                'organization_role_id' => $organization->pivot->role_id,
            ]);
            return $organization->id;
        }

        return NULL;
    }
}
