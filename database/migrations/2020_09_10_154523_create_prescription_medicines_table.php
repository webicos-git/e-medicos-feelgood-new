<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescription_medicines', function (Blueprint $table) {
            $table->id();

            $table->foreignId('prescription_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->foreignId('medicine_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->string('name')->nullable();
            $table->mediumText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prescription_medicines');
    }
}
