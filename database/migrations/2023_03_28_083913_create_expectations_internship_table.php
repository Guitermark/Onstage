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
        Schema::create('expectations_internship', function (Blueprint $table) {
            $table->id();
            $table->string('company_satisfied');
            $table->string('user_satisfied');
            $table->string('use_of_knowlegde');
            $table->string('new_topics');
            $table->string('extra_coaching');
            $table->timestamps();
            $table->foreignId('users_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expectations_internship');
    }
};
