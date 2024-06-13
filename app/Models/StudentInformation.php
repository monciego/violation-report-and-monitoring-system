<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInformation extends Model
{
    use HasFactory;
    protected $fillable = [
        "student_id",
        "first_name",
        "middle_name",
        "last_name",
        "sex",
        "department",
        "year_course",
        "address",
        "contact_number",
        "birthdate",
        "age",
        "name_of_guardian",
        "guardian_contact_number",
    ];
}
