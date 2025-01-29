<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    //
    use HasFactory;


    protected $fillable = ['user_id', 'first_name', 'middle_name', 'last_name', 'phone_number', 'telephone_number', 'address', 'birth_date', 'religion', 'civil_status', 'social_affiliation', 'monthly_income', 'annual_income', 'occupation_id'];


    public function occupation(){
        return $this->belongsTo(Occupation::class);
    }
}
