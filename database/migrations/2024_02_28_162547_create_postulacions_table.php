<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;
use App\Models\Pais;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('postulacions', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(Uuid::uuid4()->toString());
            $table->string('letra')->default('V');
            $table->boolean('estatus')->default(false);
            $table->Integer('cedula')->unique();
            $table->string('nombre');
            $table->string('apellido');
            $table->date('fecha_nac');
            $table->string('telefono')->nullable();
            $table->string('correo');
            $table->string('direccion', 200);
            // $table->string('pais_id');
            $table->foreignIdFor(Pais::class)->nullable()->references('id')->on('pais')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('genero_id')->nullable()->references('id')->on('generos')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('nivel_academico_id')->nullable()->references('id')->on('nivel_academicos')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('estado_id')->nullable()->references('id')->on('estados')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('municipio_id')->nullable()->references('id')->on('municipios')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('parroquia_id')->nullable()->references('id')->on('parroquias')->nullOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('postulacions');
    }
};
