<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'sub_category';
    protected $fillable = ['cat_id','ar_name','en_name'];
    protected $hidden = ['created_at','updated_at'];
}
