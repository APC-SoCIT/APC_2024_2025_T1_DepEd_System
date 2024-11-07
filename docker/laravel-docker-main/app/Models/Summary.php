<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Summary extends Model
{
    use HasFactory;

    protected $table = "summary";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'section',
        'mt',
        'filipino',
        'english',
        'math',
        'ap',
        'esp',
        'mapeh',
        'music',
        'arts',
        'pe',
        'health',
        'remarks',
        'ga',
    ];
}