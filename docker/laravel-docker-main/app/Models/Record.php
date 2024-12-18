<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Record extends Model
{
    use HasFactory;

    protected $table = "records";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'section',
        'quarter',
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
    ];
}