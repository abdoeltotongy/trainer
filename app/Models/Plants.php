<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plants extends Model
{
    use HasFactory;
    protected $fillable=['name'];

    public function trainers(){
        return $this->hasMany(Trainer::class);
    }
}
