<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'birth_date',
        'diabetes_type',
        'weight',
        'height',
        'gender',
        'target_glucose_min',
        'target_glucose_max',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
