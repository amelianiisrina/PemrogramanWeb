<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Major;
use App\Models\Subject;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index() {
        $students = Student::with('major', 'subjects')->get();

        $majors = Major::withCount('students')->get();

        $maxStudents = $majors->max('students_count');

        $topMajors = $majors->where('students_count', $maxStudents);

        $subjects = Subject::with('students')->get();

        $totalSKS = Student::with('subjects')->get();

        return view('reports.index', compact(
            'students',
            'topMajors',
            'subjects',
            'totalSKS'
        ));
    }
}