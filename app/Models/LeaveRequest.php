<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LeaveRequest extends Model
{
    /**
     * Get the employee this leave request belongs to
     */
    public function employee(): BelongsTo {
        return $this->belongsTo(Employee::class);
    }
}
