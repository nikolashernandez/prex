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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->increments('id');
            
            $table->date('fecha_prestamo');
            $table->decimal('monto');
            $table->decimal('resto');
            $table->foreignId('cliente_id')->constrained()->cascadeOnDelete();
            $table->string('Recomienda');
            $table->foreignId('frecuencia_pago_id')->constrained()->cascadeOnDelete(); // si es 15nal, mensual, etc
            $table->foreignId('intere_id')->constrained()->cascadeOnDelete();  // 10, 20. 5 
            $table->longText('descripcion');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
