<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'services',
        'description',
        'total_price'
    ];

    public function department(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

//    public function service(): \Illuminate\Database\Eloquent\Relations\BelongsTo
//    {
//        return $this->belongsTo(Service::class);
//    }
}
