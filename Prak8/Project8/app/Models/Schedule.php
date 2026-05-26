<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;

class Schedule extends Model
{
    protected $fillable = [
        'subject_id',
        'day',
        'start',
        'end',
        'room'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}