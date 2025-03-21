<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeList extends Model
{
    use HasFactory;
    protected $table = 'EmployeeList';

    protected $primaryKey = 'EmployeeID';
    protected $guarded = [];

}
