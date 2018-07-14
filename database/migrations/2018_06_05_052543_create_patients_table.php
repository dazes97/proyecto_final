<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->tinyInteger('age');
            $table->char('gender',1);
            $table->date('birthdate');
            $table->string('birthplace');
            $table->integer('ci');
            $table->string('nationality');
            $table->string('address')->nullable();
            $table->bigInteger('phone')->nullable();
            $table->unsignedInteger('client_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
