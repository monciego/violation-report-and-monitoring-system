<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

public function scopeFilter($query, array $filters)
{
    if($filters['search'] ?? false) {
        $searchTerm = '%' . request('search') . '%';
        $query->where(function($query) use ($searchTerm) {
            $query->where('first_name', 'like', $searchTerm)
                  ->orWhere('last_name', 'like', $searchTerm)
                  ->orWhere('middle_name', 'like', $searchTerm)
                  ->orWhere('student_id', 'like', $searchTerm)
                  ->orWhereRaw("CONCAT(first_name, ' ', last_name) like ?", [$searchTerm])
                  ->orWhereRaw("CONCAT(first_name, ' ', middle_name, ' ', last_name) like ?", [$searchTerm]);
        });
    }

     if($filters['filter'] ?? false) {
        $query->where('department', request('filter'));
    }
}

    /* violation */
    public function violators(): HasMany
    {
        return $this->hasMany(Violator::class);
    }
}
