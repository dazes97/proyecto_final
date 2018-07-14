<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileRepositoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_repository', function (Blueprint $table) {
            $table->integer('file_id')->unsigned()->nullable();
            $table->foreign('file_id')->references('id')
                ->on('files')->onDelete('cascade');

            $table->integer('repository_id')->unsigned()->nullable();
            $table->foreign('repository_id')->references('id')
                ->on('repositories')->onDelete('cascade');

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
        Schema::dropIfExists('file_repository');
    }
}
