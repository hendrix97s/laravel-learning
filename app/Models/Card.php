<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'description',
      'code',
    ];

    protected $hidden = [
      'id',
      'created_at',
      'updated_at',
    ];
}
