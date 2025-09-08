<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = ['sucursal', 'lat', 'lng', 'location_group_id'];

    public function locationGroup(){
        return $this->belongsTo(locationGroup::class, 'location_group_id');
    }
    
    public function address(){
        return $this->hasOne(Address::class);
    }

    public function emails(){
        return $this->hasMany(LocationEmail::class, 'location_id');
    }

    public function phones(){
        return $this->hasMany(LocationPhone::class, 'location_id');
    }
}
