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


    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeInactive($query)
    {
        return $query->where('status', 'inactive');
    }

    public function scopeTerminated($query)
    {
        return $query->whereIn('status', ['terminated','suspended']);
    }
}
