<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesHasUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules_has_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('schedules_id');
            $table->unsignedBigInteger('patients_id')->nullable();
            $table->string('date');
            $table->string('status')->nullable();

            $table->foreign('users_id')
            ->references('id')->on('users')
            ->onDelete('cascade');

            $table->foreign('schedules_id')
            ->references('id')->on('schedules');

            $table->foreign('patients_id')
            ->references('id')->on('patients');

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
        Schema::dropIfExists('schedules_has_users');
    }
}
