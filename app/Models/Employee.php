<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employee';

    protected $fillable = [
        'company_id', 'f_name', 'l_name','email','phone'
    ];

  /**
     * Get the user that owns the phone.
     */
    public function company()
    {
        return $this->belongsTo('App\Models\CompanyModel');
    }
}
