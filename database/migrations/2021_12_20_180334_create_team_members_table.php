<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeamMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->bigInteger('project_leader_id')->unsigned()->nullable();
            //cascade delete project_leader_id
            $table->foreign('project_leader_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('staff_id')->unsigned()->nullable();
            //cascade delete staff_id
            $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade');

            $table->integer('project_id')->unsigned()->nullable();
            //cascade delete project_id
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('team_members');
    }
}
