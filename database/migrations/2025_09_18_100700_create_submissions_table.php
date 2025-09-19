<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('submissions', function (Blueprint $table) {
            $table->id();  // Submission ID
            $table->foreignId('form_id')->constrained('forms')->onDelete('cascade'); // Link to forms table
            $table->json('answers');  // JSON data for answers
            $table->timestamps();  // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submissions');
    }
};
