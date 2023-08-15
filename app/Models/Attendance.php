<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = ['user_enter' ,'user_exist' , 'trainer_id' , 'date_in' , 'date_out'];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

}
