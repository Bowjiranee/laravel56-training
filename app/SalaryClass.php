<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryClass extends Model
{
    protected $table = 'salary_class';
    
    public function user()
    {
        return $this->hasOne('App\User');
    }
}
