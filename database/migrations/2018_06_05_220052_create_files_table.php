<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uri');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('type_file_id');
            $table->unsignedInteger('parent_node')->nullable();
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('metadata_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('type_file_id')->references('id')->on('type_file');
            $table->foreign('metadata_id')->references('id')->on('metadata');
        });
        DB::statement('ALTER TABLE files ADD FOREIGN KEY (parent_node) REFERENCES files(id)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
