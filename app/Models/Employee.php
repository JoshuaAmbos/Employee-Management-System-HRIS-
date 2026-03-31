<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{   

    protected $fillable = [
        'user_id', 'department_id', 'first_name', 'last_name','email','phone','address','position','hire_date','employment_status',
    ];

    /** 
     * Get the user that owns the employee profile
     * */ 
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the department this employee belongs to
     */
    public function department(): BelongsTo {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get the attendance record of this employee
     */
    public function attendance(): HasMany {
        return $this->hasMany(Attendance::class);
    }

    /**
     * Get the leave requests submitted by this employee (if any)
     */
    public function leaveRequestsSubmitted(): HasMany {
        return $this->hasMany(LeaveRequest::class, 'employee_id');
    }

    /**
     * Get the leave requests approved by this employee (if manager)
     */
    public function leaveRequestsApproved(): HasMany {
        return $this->hasMany(LeaveRequest::class, 'approved_by');
    }
}
