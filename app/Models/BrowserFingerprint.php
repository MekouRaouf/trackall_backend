<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrowserFingerprint extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "website_url",
        "useragent",
        "browsername",
        "connection_type",
        "languages",
        "selected_language",
        "cookies",
        "processorcores",
        "ram_memory",
        "screenW",
        "screenH"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
