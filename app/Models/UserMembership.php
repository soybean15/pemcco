<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMembership extends Model
{
    use HasFactory;
    protected $fillable = [
        'membership_id',
        'membership_date',
        'membership_type',
        'status',
    ];
}
