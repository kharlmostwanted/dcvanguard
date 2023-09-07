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
        Schema::table('payments', function (Blueprint $table) {
            $table->datetime('received_at')->nullable();
            $table->string('or_number')->nullable();
            $table->string('check_number')->nullable();
            $table->string('check_bank')->nullable();
            $table->date('check_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn('received_at');
            $table->dropColumn('or_number');
            $table->dropColumn('check_number');
            $table->dropColumn('check_bank');
            $table->dropColumn('check_date');
        });
    }
};
