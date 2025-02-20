<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMembership extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active')
                     ->whereHas('user');
    }

    public function scopeInactive($query)
    {
        return $query->where('status', 'inactive')
                     ->whereHas('user');
    }

    public function scopeTerminated($query)
    {
        return $query->whereIn('status', ['terminated', 'suspended'])
                     ->whereHas('user');
    }

    public function scopeRegular($query)
    {
        return $query->whereRaw('LOWER(membership_type) = ?', ['regular']);
    }

    public function scopeAssociate($query)
    {
        return $query->whereRaw('LOWER(membership_type) = ?', ['associate']);
    }

    
}
