<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Task;
use App\Models\Product;
use App\Models\CartItem;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'default_billing_address_id',
        'default_shipping_address_id'

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

    public function tasks(): HasMany{
        return $this->hasMany(Task::class, 'user_id');
    }
    public function addresses(): HasOne{
        return $this->hasOne(Address::class, 'user_id');
    }
    public function cartItems(): HasMany{
        return $this->hasMany(CartItem::class, 'user_id');
    }

    public function products(): HasMany{
        return $this->hasMany(Product::class, 'user_id');
    }

    public function orders(): HasMany{
        return $this->hasMany(Order::class, 'user_id');
    }


}
