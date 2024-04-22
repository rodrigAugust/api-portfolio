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
        Schema::create('graduations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('beginning');
            $table->date('end');
            $table->string('badge')->nullable();
            $table->unsignedBigInteger('id_gender');
            $table->unsignedBigInteger('id_institution');
            $table->unsignedBigInteger('id_user');
            $table->timestamps();

            $table->foreign('id_gender')->references('id')->on('genders');
            $table->foreign('id_institution')->references('id')->on('institutions');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('graduations');
    }
};
