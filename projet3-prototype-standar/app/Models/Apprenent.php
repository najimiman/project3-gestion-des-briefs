<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Brif;

class Apprenent extends Model
{
    use HasFactory;
    protected $table='apprenents';
    
    public function brifs(){
        
        return $this->belongsToMany(Brif::class, 'brifapprents');
    }
}
