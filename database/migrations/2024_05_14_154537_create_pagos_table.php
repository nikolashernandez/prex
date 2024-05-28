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
        Schema::create('pagos', function (Blueprint $table) {
            $table->increments('id');//$table->id();
            $table->decimal('total_abonado'); // especifica cuanto esta abonando en total el cliente
            $table->decimal('abono_capital'); 
            $table->decimal('abono_interes'); 
            $table->date('abono_fecha');
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
        Schema::dropIfExists('pagos');
    }
};
