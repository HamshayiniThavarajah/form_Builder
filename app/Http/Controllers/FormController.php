<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index() {
        return Form::all(); // Get all forms
    }

    public function store(Request $request) {
        return Form::create($request->all()); // Create new form
    }

    public function show(Form $form) {
        return $form;
    }

    public function update(Request $request, Form $form) {
        $form->update($request->all());
        return $form;
    }

    public function destroy(Form $form) {
        $form->delete();
        return response()->noContent();
    }
}
