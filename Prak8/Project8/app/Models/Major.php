<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Major extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relationship: one major has many students
    public function students() {
        return $this->hasMany(Student::class);
    }
}

