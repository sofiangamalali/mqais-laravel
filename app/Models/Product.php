<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = ['ar_name','en_name','cat_id','sub_cat_id','image','ar_details_pdf','en_details_pdf','manual_pdf'];
    protected $hidden = ['created_at'];
}
