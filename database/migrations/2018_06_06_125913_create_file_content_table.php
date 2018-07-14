<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_content', function (Blueprint $table) {
            $table->integer('file_id')->unsigned()->nullable();
            $table->foreign('file_id')->references('id')
                ->on('files')->onDelete('cascade');

            $table->integer('content_id')->unsigned()->nullable();
            $table->foreign('content_id')->references('id')
                ->on('contents')->onDelete('cascade');

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
        Schema::dropIfExists('file_content');
    }
}
