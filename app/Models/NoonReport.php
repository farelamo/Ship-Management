<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoonReport extends Model
{
    use HasFactory;

    protected $fillable = ['noon_desc', 'navigation', 'engine', 'current_rob', 'consumption_rate'];
}
