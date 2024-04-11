<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BestSeller extends Model
{
    use HasFactory;
    protected $table = 'bestseller';
    protected $fillable = ['product_id'];
    protected $hidden = ['created_at','updated_at'];
    public static $rules = [
        'product_id' => 'required|unique:bestseller'
    ];
}
