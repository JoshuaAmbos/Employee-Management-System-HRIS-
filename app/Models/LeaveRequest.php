<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LeaveRequest extends Model
{

    // Fillable fields
    protected $fillable =[
        'employee_id',
        'leave_type',
        'start_date',
        'end_date',
        'reason',
        'status',
        'approved_by'
    ];

    /**
     * Get the employee this leave request belongs to
     */
    public function employee(): BelongsTo {
        return $this->belongsTo(Employee::class);
    }

    /**
     * Get the manager that approved this leave request
     */
    public function approvedBy(): BelongsTo {
        return $this->belongsTo(Employee::class, 'approved_by');
    }
}
