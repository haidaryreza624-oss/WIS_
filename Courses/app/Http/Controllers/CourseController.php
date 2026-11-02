<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Course;
use Illuminate\Validation\Rule;
class CourseController extends Controller
{
    // store and validate course data
    public function store(Request $request){
        // course code normalization
        // $request->merge([
        //     'course_code' =>strtoupper(trim((string) $request->input('course_code', ''))),
        // ]);
        // form filed validations
        $validated = $request->validate([
            'course_code' => ['required', 'string', 'max:20', Rule::unique('courses', 'course_code')->where('user_id', $request->user()->id)],

            'course_name' => ['required', 'string', 'max:150'],
            'credit_hours' => ['required', 'integer', 'between:3,9'],
            'semester' => ['required', 'string', Rule::in(['Spring 2026', 'Fall 2026'])],

        ]);

        // user Id getting from session
        $validated['user_id'] = $request->user()->id;

        Course::create($validated);

        return redirect()->route('dashboard')->with('success', 'Course has registered successfully!');

    }
}
