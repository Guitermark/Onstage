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
        Schema::create('competences', function (Blueprint $table) {
            $table->id();
            $table->string('analysis');
            $table->string('advise');
            $table->string('design');
            $table->string('build');
            $table->string('manage_control');
            $table->string('ex_analysis');
            $table->string('ex_advise');
            $table->string('ex_design');
            $table->string('ex_build');
            $table->string('ex_manage_control');
            $table->timestamps();
            $table->foreignId('assignment_id')->constrained()->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competences');
    }
};
