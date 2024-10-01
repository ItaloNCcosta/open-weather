<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Weather extends Model
{
  use HasFactory, SoftDeletes, HasUlids;

  protected $fillable = [
    'city',
    'temp',
    'temp_max',
    'temp_min',
    'weather_main',
    'description',
    'humidity',
    'icon',
    'api'
  ];
}
