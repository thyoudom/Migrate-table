<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name_en',
        'company_name_kh',
        'vat_tin',
        'phone',
        'address_en',
        'addess_kh',
        'email',
        'gender',
        'status',
    ];
    
}
