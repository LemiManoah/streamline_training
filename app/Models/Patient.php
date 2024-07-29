<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;

class Patient extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'dateOfBirth',
        'phonenumber',
        'NIN',
        'marital',
        'nextOfkin',
        'kincontactNumber',
        'Relationship'
        
    ];
    use HasFactory;
    public function medicalRecords(){
        return $this->hasOne(MedicalRecord::class);
    }
}
