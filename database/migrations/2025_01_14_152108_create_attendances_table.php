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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('employee_id')->constrained();
            $table->date('date');
            $table->datetime('time_in')->nullable();
            $table->datetime('time_out')->nullable();
            $table->string('status')->nullable();
            $table->boolean('with_pay')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
