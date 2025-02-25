<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('course_user', function (Blueprint $table) {
            $table->uuid('user_id');
            $table->uuid('course_id');
            $table->integer('progress')->default(0);
            $table->enum('medal', ['none', 'bronze', 'silver', 'gold'])->default('none');

            $table->primary(['user_id', 'course_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('course_user');
    }
};
