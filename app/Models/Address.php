<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['street','number', 'neighborhood', 'zip_code', 'city', 'location_id'];

    public function location(){
        return $this->belongsTo(Location::class);
    }
}
