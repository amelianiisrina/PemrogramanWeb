<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Schedule;
use App\Models\Student;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sks'];

    // Relationship: many subjects belong to many students
    public function students() {
        return $this->belongsToMany(Student::class);
    }

    public function schedule() {
        return $this->hasOne(Schedule::class);
    }
}
