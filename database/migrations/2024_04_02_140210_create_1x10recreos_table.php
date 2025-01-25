<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('1x10recreos', function (Blueprint $table) {
            
            $table->uuid('id')->primary()->default(Uuid::uuid4()->toString());
            $table->Integer('cedula')->unique();
            $table->string('NombreCompleto');
            $table->date('fecha_nac');
            $table->string('telefono')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('1x10recreos');
    }
};
