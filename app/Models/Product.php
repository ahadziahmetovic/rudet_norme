<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'color',
        'conductor_length',
        'packaging',
        'certificate',
        'CE_mark',
        'hazard_class',
        'un_no',
        'status',
        
    ];
}
