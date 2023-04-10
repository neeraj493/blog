<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyModel extends Model
{
    use HasFactory;

     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'company';

    protected $fillable = [
        'name', 'email', 'image','website'
    ];

    public function employee()
    {
        return $this->hasMany('App\Models\Employee');
    }


}
