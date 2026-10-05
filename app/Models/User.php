<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'role',
        'age',
        'points',
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

    // Accessors & Mutators (Acara 19)
    public function setPasswordAttribute($value) {
        $this->attributes['password'] = \Illuminate\Support\Facades\Hash::needsRehash($value) ? bcrypt($value) : $value;
    }

    public function getFullNameAttribute() {
        return $this->name . ' (User)'; // Simplified since we don't have first_name/last_name
    }

    // Relationships (Acara 19)
    public function profile() {
        return $this->hasOne(Profile::class);
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    // Local Scope (Acara 19)
    public function scopeActive($query) {
        return $query->where('active', 1); // We use status='active' but following PDF using active=1 or similar? Wait, PDF says `where('active', 1)`. I will just put `where('status', 'active')` for it to work.
    }
    
    public function scopeActiveStatus($query) {
        return $query->where('status', 'active');
    }
}
