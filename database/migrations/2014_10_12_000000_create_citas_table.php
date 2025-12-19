<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->string('cliente');
            $table->string('telefono');
            $table->text('diseno');
            $table->string('zona_cuerpo');
            $table->dateTime('fecha_hora');
            $table->enum('estado', ['agendada', 'cancelada'])->default('AGENDADA');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
