<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Ramsey\Uuid\Uuid;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('n_b_c_s', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(Uuid::uuid4()->toString());
            $table->string('nombre');
            $table->string('codigo');

            $table->foreignUuid('jefe_id')->nullable()->references('id')->on('registro_luchadors')->nullOnDelete()->cascadeOnUpdate();

            $table->foreignUuid('organizador_id')->nullable()->default('0')->references('id')->on('registro_luchadors')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('formador_id')->nullable()->default('0')->references('id')->on('registro_luchadors')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('comunicador_id')->nullable()->default('0')->references('id')->on('registro_luchadors')->nullOnDelete()->cascadeOnUpdate();

            // DATOS SOCIALES

            $table->integer('circuitos_comunales')->nullable();
            $table->integer('bases_misiones')->nullable();
            $table->integer('casa_alimentacion')->nullable();
            $table->integer('consejos_comunales')->nullable();
            $table->integer('urbanismos')->nullable();
            $table->integer('parques_nacionales')->nullable();
            $table->integer('parques_recreacion')->nullable();
            $table->integer('rios')->nullable();
            $table->integer('playas')->nullable();
            $table->integer('balnearios')->nullable();
            $table->integer('plazas')->nullable();
            $table->integer('canchas')->nullable();

            $table->foreignId('estado_id')->nullable()->references('id')->on('estados')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('municipio_id')->nullable()->references('id')->on('municipios')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('parroquia_id')->nullable()->references('id')->on('parroquias')->nullOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('n_b_c_s');
    }
};
