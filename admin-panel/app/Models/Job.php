<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'company',
        'description',
        'location',
        'requirement',
        'employment_type',
        'education',
        'skills',
        'experience_years',
        'experience_months',
        'salary',
        'deadline',
        'benefits',
        'contact_email',
    ];
}
