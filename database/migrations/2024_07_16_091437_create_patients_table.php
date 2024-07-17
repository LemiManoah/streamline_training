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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('gender', ['m', 'f'])->comment('m is male and f is female');
            $table->date('dateOfBirth');
            $table->string('phonenumber', 10);
            $table->string('NIN');
            $table->enum('marital', ['1', '2', '3'])->comment('1 is single, 2 is married, 3 is divorced');
            $table->string('nextOfkin');
            $table->string('kincontactNumber', 10);
            $table->string('Relationship');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
