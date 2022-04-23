<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function applicants()
    {
        return $this->belongsToMany(Applicant::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function requirement()
    {
        return $this->hasOne(JobRequirement::class);
    }

    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }
}
