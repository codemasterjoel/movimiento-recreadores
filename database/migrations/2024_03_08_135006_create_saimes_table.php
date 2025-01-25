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
        Schema::create('saimes', function (Blueprint $table) {
            $table->id();

            $table->string('letra');
            $table->bigInteger('cedula')->unique();
            $table->string('apellido1');
            $table->string('apellido2')->nullable();
            $table->string('nombre1');
            $table->string('nombre2')->nullable();
            $table->date('fecha_nac');

            //$table->biginteger('genero_id')->unsigned()->nullable();
            $table->foreignId('genero_id')->nullable()->references('id')->on('generos')->nullOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saimes');
    }
};
