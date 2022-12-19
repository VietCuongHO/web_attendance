<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('last_name', 100);
            $table->string('first_name', 20);
            $table->timestamp('birth_day')->nullable();
            $table->tinyInteger('gender');
            $table->string('address', 200);
            $table->string('numerphone', 15);
            $table->string('department', 100);
            $table->string('position', 100);
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->string('working_day', 10);
            $table->integer('salary');
            $table->string('office_id');
            $table->string('note', 100);

            $table->timestamp('create_at')->nullable();
            $table->unsignedBigInteger('create_user');
            $table->timestamp('update_at')->nullable();
            $table->unsignedBigInteger('update_user');

            $table->foreign('create_user')->references('id')->on('employees');
            $table->foreign('update_user')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
