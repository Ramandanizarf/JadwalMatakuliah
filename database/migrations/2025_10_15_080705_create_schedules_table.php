<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
            $table->foreignId('lecturer_id')->constrained('lecturers')->onDelete('cascade');
            $table->foreignId('room_id')->constrained('rooms')->onDelete('cascade');
            $table->foreignId('timeslot_id')->constrained('timeslots')->onDelete('cascade');
            $table->string('semester')->nullable();
            $table->string('class')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('schedules');
    }
};
