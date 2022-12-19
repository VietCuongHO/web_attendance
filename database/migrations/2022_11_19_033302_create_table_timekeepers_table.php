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
        Schema::create('timekeepers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('office_id');
            $table->string('account', 100);
            $table->string('password', 100);
            $table->tinyInteger('device_index');
            $table->tinyInteger('status');

            $table->timestamp('create_at')->nullable();
            $table->unsignedBigInteger('create_user');
            $table->timestamp('update_at')->nullable();
            $table->unsignedBigInteger('update_user');

            $table->foreign('office_id')->references('id')->on('offices');
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
        Schema::dropIfExists('timekeepers');
    }
};
