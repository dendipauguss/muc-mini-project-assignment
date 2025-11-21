<?php

namespace App\Models\activity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\marketing\ServiceusedModel;
use App\Models\hrd\EmployeesModel;

class TimesheetModel extends Model
{
    use HasFactory;
    protected $connection = 'mysql_activity';
    protected $table = 'timesheet'; // atau nama table yang sesuai

    protected $guarded = [
        'date',
        'timestart',
        'timefinish',
        'employees_id',
        'serviceused_id',
        'description'
    ];
    public function serviceused()
    {
        return $this->belongsTo(ServiceusedModel::class, 'serviceused_id');
    }

    public function employees()
    {
        return $this->belongsTo(EmployeesModel::class, 'employees_id');
    }
}
