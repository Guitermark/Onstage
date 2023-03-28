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
        Schema::create('assignment', function (Blueprint $table) {
            $table->id();
            $table->string('problem');
            $table->string('assignment_explained');
            $table->string('end_result');
            $table->string('products');
            $table->string('assignment_profile');
            $table->string('challenges_assignment_coaching');
            $table->timestamps();
            $table->foreignId('users_id')->constrained()->onDelete('cascade');
        });
    }
   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignment');
    }
};
