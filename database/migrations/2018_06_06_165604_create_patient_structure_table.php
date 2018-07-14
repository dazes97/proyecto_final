<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientStructureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_structure', function (Blueprint $table) {
            $table->integer('patient_id')->unsigned()->nullable();
            $table->foreign('patient_id')->references('id')
                ->on('patients')->onDelete('cascade');

            $table->integer('structure_id')->unsigned()->nullable();
            $table->foreign('structure_id')->references('id')
                ->on('structures')->onDelete('cascade');

            $table->integer('type_structure_id')->unsigned()->nullable();
            $table->foreign('type_structure_id')->references('id')
                ->on('type_structure')->onDelete('cascade');

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
        Schema::dropIfExists('patient_structure');
    }
}
