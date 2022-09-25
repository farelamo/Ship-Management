<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoonReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'noon_desc', 'passage_plan', 'engine', 'current_rob', 'consumption_rate',
        'empty_desc', 'empty_passage', 'empty_engine', 'empty_current', 'empty_consumption'
    ];

    protected $casts = [
        'noon_desc'         => 'json', 
        'passage_plan'      => 'json', 
        'engine'            => 'json', 
        'current_rob'       => 'json', 
        'consumption_rate'  => 'json', 
        'empty_desc'        => 'boolean',
        'empty_passage'     => 'boolean',
        'empty_engine'      => 'boolean',
        'empty_current'     => 'boolean',
        'empty_consumption' => 'boolean',
    ];
}
