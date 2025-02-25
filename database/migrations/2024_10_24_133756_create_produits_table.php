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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('Materiels');
            
            $table->string('colors')->nullable();
            $table->string('prix')->nullable();
            $table->text('imageName');
            $table->text('description');
            $table->string('id_prod');
            $table->string('catg_id');
            // $table->foreign('catg_id')->references('id')->on('categorees'); 
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
