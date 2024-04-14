<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    use HasFactory;

    protected $fillable = ['name', 'dob', 'status', 'join_date','isDelete'];

    public function employee_detail()
    {
        return $this->hasMany(Employee_detail::class);
    }

    public static function newFactory()
    {
        return \Database\Factories\EmployeeFactory::new();
    }
}
