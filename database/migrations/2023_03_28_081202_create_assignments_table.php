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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->string('problem')->nullable();
            $table->string('description');
            $table->boolean('draft')->nullable();
            $table->boolean('graduate')->default(false);
            $table->uuid('edit_key')->nullable();
            $table->foreignId('company_id')->nullable()->constrained()->restrictOnDelete();
            $table->timestamps();
            $table->foreignId('users_id')->constrained()->restrictOnDelete();
            $table->unsignedBigInteger('users2_id')->nullable();
            $table->foreign('users2_id')->references('id')->on('users');
        });
    }
   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
