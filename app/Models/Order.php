<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'net_amount',
        'address',
        'status'
    ];


    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function order_products():HasMany{
       return $this->hasMany(OrderProduct::class, 'order_id');
    }

    public function order_events():HasMany{
        return $this->hasMany(OrderEvent::class, 'order_id');
     }


}
