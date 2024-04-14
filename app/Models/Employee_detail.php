<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee_detail extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'experience', 'job_title', 'job_desc', 'isDelete'];

    public function employee()
    {
        return $this->belongsTo(employee::class);
    }

    public static function newFactory()
    {
        return \Database\Factories\Employee_detailFactory::new();
    }
}
