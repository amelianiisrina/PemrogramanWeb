<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['nim', 'name', 'address', 'major_id'];

    // Relationship: many students belong to one major
    public function major() {
        return $this->belongsTo(Major::class);
    }
    
    // Relationship: many students belong to many subjects
    public function subjects() {
        return $this->belongsToMany(Subject::class);
    }
}
