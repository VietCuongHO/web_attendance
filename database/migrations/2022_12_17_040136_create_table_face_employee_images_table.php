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
        Schema::create('face_employee_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id');
            $table->string('image_url', 500);
            $table->longText('description');
            $table->tinyInteger('status');

            $table->timestamp('created_at')->nullable();
            $table->unsignedBigInteger('created_user');
            $table->timestamp('updated_at')->nullable();
            $table->unsignedBigInteger('updated_user');

            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('created_user')->references('id')->on('employees');
            $table->foreign('updated_user')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('face_employee_images');
    }
};
