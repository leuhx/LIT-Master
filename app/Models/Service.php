<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price'
    ];

//    public function serviceOrders(): \Illuminate\Database\Eloquent\Relations\HasMany
//    {
//        return $this->hasMany(ServiceOrder::class);
//    }
}
