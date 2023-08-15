<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email', 'phone','plant_id','QR_code','intern_number',
        'national_id', 'division'
    ];

    public function plant(){
        return $this->belongsTo(Plants::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
