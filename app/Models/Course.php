<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['course_name', 'duration', 'instructor_id', 'cost'];

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }
}