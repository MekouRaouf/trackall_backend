<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geolocation extends Model
{
    use HasFactory;

    protected $fillable = [
        "website_url",
        "longitude",
        "latitude"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
