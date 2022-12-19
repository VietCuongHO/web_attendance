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
        Schema::create('timesheets', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('timekeeper_id');
            $table->timestamp('timekeeping_at')->nullable();
            $table->string('face_image', 200);
            $table->tinyInteger('status');
            $table->string('note', 100);

            $table->timestamp('create_at')->nullable();
            $table->unsignedBigInteger('create_user');
            $table->timestamp('update_at')->nullable();
            $table->unsignedBigInteger('update_user');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timesheets');
    }
};
