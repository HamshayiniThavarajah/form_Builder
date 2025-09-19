<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = ['form_id', 'answers'];
    protected $casts = ['answers' => 'array']; // JSON to array

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
