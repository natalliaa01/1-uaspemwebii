<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'participant_id', 'status'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }
}