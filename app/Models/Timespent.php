<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timespent extends Model
{
    use HasFactory;

    protected $fillable = [
        'website_url',
        'totaltime'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
