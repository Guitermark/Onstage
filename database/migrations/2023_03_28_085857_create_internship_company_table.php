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
        Schema::create('internship_company', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('street');
            $table->string('number');
            $table->string('city');
            $table->string('province');
            $table->string('postalcode');
            $table->string('description_company');
            $table->string('department');
            $table->string('amount_employees');
            $table->string('contact_person');
            $table->string('coach');
            $table->string('expertise_diploma');
            $table->string('expectations_to_company');
            $table->string('expectations_from_company');
            $table->string('safety_features');
            $table->string('work_location_travel');
            $table->foreignId('users_id')->constrained()->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internship_company');
    }
};
