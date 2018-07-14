<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStructureFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('structure_files', function (Blueprint $table) {
            $table->integer('structure_id')->unsigned()->nullable();
            $table->foreign('structure_id')->references('id')
                ->on('structures')->onDelete('cascade');

            $table->integer('file_id')->unsigned()->nullable();
            $table->foreign('file_id')->references('id')
                ->on('files')->onDelete('cascade');

            $table->unsignedInteger('client_id');
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
        Schema::dropIfExists('structure_file');
    }
}
