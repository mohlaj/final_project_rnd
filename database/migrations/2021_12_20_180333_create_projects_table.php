<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('duration')->nullable();
            $table->integer('cost')->nullable();
            $table->text('requirments')->nullable();
            $table->string('client')->nullable();
            $table->string('project_status')->nullable();
            $table->string('project_stage')->nullable();
            $table->string('project_category')->nullable();
            $table->bigInteger('project_leader_id')->unsigned()->nullable();
            //cascade delete project_leader_id
            $table->foreign('project_leader_id')->references('id')->on('users')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('projects');
    }
}
