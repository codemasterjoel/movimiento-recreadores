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
        Schema::create('integrantes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('jefe_id')->nullable()->references('id')->on('registro1x10ffms')->nullOnDelete()->cascadeOnUpdate();
            $table->integer('cedula');
            $table->string('nombreCompleto');
            $table->foreignId('saime_id')->nullable()->references('id')->on('saimes')->nullOnDelete()->cascadeOnUpdate();
            $table->string('telefono')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('integrantes');
    }
};
