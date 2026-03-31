<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    /**
     * Get the employee of this attendance record
     */
    public function employee(): BelongsTo {
        return $this->belongsTo(Employee::class);
    }
}
