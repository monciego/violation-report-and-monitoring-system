<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Violator extends Model
{
    use HasFactory;

    protected $fillable = [
        "student_information_id",
        "violation",
        "violation_date",
        "violation_time",
        "status",
        "comment",
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(StudentInformation::class, "student_information_id");
    }
}
