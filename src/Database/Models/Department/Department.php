<?php

namespace Pishgaman\Pishgaman\Database\Models\Department;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';
    protected $fillable = ['name','pid'];
    
}
