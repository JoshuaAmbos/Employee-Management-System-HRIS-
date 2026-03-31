<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * Show employees in this department
     */
    public function employees() {
        return $this->hasMany(Employee::class);
    }
}
