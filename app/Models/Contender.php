<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contender extends Model
{
    protected $fillable = ['name', 'last_name', 'class', 'gender', 'status', 'team_id'];

    /** @use HasFactory<\Database\Factories\ContenderFactory> */
    use HasFactory;
}
