<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('departments')->onDelete('set null');
            $table->foreignId('department_id')->nullable()->constrained('departments')->onDelete('set null');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone')->unique();
            $table->string('position');
            $table->date('hire_date');
            $table->string('employment_status');
            $table->timestamps();
        });

        Schema::table('departments', function (Blueprint $table){
            $table->foreign('manager_id')->references('id')->on('employees')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
