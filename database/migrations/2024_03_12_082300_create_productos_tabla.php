

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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo');
            $table->string('nombre');
            $table->string('abreviatura');
            $table->foreignId('categoria_id')
                    ->nullable()
                    ->constrained('categorias')
                    ->cascadeOnUpdate()
                    ->nullOnDelete();
            $table->foreignId('marca_id')
                    ->nullable()
                    ->constrained('marcas') // Referencia a la tabla marcas
                    ->cascadeOnUpdate()
                    ->nullOnDelete();
            $table->foreignId('unidad_id')
                    ->nullable()
                    ->constrained('unidads') // Referencia a la tabla marcas
                    ->cascadeOnUpdate()
                    ->nullOnDelete();
            $table->decimal('p_compra', 10,2)->nullable();
            $table->decimal('p_venta', 10,2)->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
