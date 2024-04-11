<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table = 'message';
    protected $fillable = ["firstName","lastName","email","phoneNumber","message","created_at","updated_at"];
    protected $hidden = ['created_at',"updated_at"];
}
