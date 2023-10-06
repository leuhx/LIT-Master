<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'acronym'
    ];

    public function serviceOrders(): \Illuminate\Database\Eloquent\Relations\Hasmany
    {
        return $this->hasMany(ServiceOrder::class);
    }
}
