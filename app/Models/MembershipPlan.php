<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'price',
        'description',
        'refill_slots',
        'benefits',
        'status',
        'duration_months',
    ];

    protected $casts = [
        'benefits' => 'array',
    ];
}
