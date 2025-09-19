<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function index() {
        return Submission::all(); // Get all submissions
    }

    public function store(Request $request) {
        return Submission::create($request->all()); // Create new submission
    }

    public function show(Submission $submission) {
        return $submission;
    }
}
