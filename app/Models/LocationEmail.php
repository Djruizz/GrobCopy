<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationEmail extends Model
{
    use HasFactory;
    protected $fillable = ['email', 'location_id'];

    public function Location(){
        return $this->belongsTo(Location::class);
    }
}
