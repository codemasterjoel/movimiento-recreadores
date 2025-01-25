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
            $table->foreignUuid('movilizador_id')->nullable()->default('0')->references('id')->on('registro_luchadors')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('defensa_id')->nullable()->default('0')->references('id')->on('registro_luchadors')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('productivo_id')->nullable()->default('0')->references('id')->on('registro_luchadors')->nullOnDelete()->cascadeOnUpdate();

            // DATOS SOCIALES

            $table->integer('cant_consejos_comunales')->nullable();
            $table->integer('cant_bases_misiones')->nullable();
            $table->integer('cant_urbanismos')->nullable();
            $table->integer('cant_cdi')->nullable();

            // DATOS FFM

            $table->integer('cant_lsb_jefe_ubch')->nullable();
            $table->integer('cant_lsb_jefe_comunidad')->nullable();
            $table->integer('cant_lsb_jefe_calle')->nullable();
            $table->integer('cant_lsb_vocero_cc')->nullable();

            $table->foreignId('estado_id')->nullable()->references('id')->on('estados')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('municipio_id')->nullable()->references('id')->on('municipios')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('parroquia_id')->nullable()->references('id')->on('parroquias')->nullOnDelete()->cascadeOnUpdate();

            $table->text('latitud')->nullable();
            $table->text('longitud')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('n_b_c_s');
    }
};
