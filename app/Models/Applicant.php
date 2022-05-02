<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'other_files' => 'array',
        'skills' => 'array'
    ];

    public function jobs()
    {
        return $this->belongsToMany(Job::class);
    }

    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }
}
