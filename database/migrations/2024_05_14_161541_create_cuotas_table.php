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
        Schema::create('cuotas', function (Blueprint $table) {
            $table->increments('id');//$table->id();
            $table->date('fecha_inicial');
            $table->date('fecha_final');
            $table->decimal('monto_cuota');
            $table->timestamps();

            $table->integer('prestamo_id')->unsigned();
	        $table->foreign('prestamo_id')->references('id')->on('prestamos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuotas');
    }
};
