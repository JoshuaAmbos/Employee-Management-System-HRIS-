<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{

    // Which columns are safe to be filled from a form
    protected $fillable = [
        'employee_id', 
        'attendance_date', 
        'time_in', 
        'time_out', 
        'status', 
        'remarks'
    ];

    /**
     * Get the employee of this attendance record
     */
    public function employee(): BelongsTo {
        return $this->belongsTo(Employee::class);
    }
}
