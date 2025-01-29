<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class salaries extends Model
{
    //use HasFactory;
    protected $fillable = ['name', 'email', 'salary_local', 'salary_euros', 'commission'];
    protected $appends = ['displayed_salary'];
    public function getDisplayedSalaryAttribute() {
        return $this->salary_euros + $this->commission;
    }
}
