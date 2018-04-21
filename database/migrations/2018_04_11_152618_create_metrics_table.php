<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metrics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('files');
            $table->integer('loc');
            $table->integer('ncloc');
            $table->integer('classes');
            $table->integer('methods');
            $table->integer('coveredmethods');
            $table->integer('conditionals');
            $table->integer('coveredconditionals');
            $table->integer('statements');
            $table->integer('coveredstatements');
            $table->integer('elements');
            $table->integer('coveredelements');
            $table->integer('project_id')->unsigned()->index();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
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
        Schema::dropIfExists('metrics');
    }
}
