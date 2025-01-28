<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Pais;

use Ramsey\Uuid\Uuid;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registro_luchadors', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary()->default(Uuid::uuid4()->toString());
            $table->string('letra')->default('V');
            $table->boolean('estatus')->default('1');
            $table->date('inactivo')->nullable();
            $table->Integer('cedula')->unique();
            $table->string('nombre');
            $table->string('apellido');
            $table->date('fecha_nac');
            $table->string('telefono')->nullable();
            $table->string('correo');
            $table->Integer('edad');
            $table->bigInteger('cuenta')->nullable();
            $table->integer('serial')->nullable();
            $table->string('codigo')->nullable();
            $table->foreignId('genero_id')->nullable()->references('id')->on('generos')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('nivel_academico_id')->nullable()->references('id')->on('nivel_academicos')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('profesion_id')->nullable()->references('id')->on('profesions')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('responsabilidad_id')->nullable()->references('id')->on('responsabilidads')->nullOnDelete()->cascadeOnUpdate();
            // $table->foreignIdFor(Pais::class)->nullable()->references('id')->on('pais')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('estado_id')->nullable()->references('id')->on('estados')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('municipio_id')->nullable()->references('id')->on('municipios')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('parroquia_id')->nullable()->references('id')->on('parroquias')->nullOnDelete()->cascadeOnUpdate();
            $table->string('direccion', 200);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('registro_luchadors');
    }
};
