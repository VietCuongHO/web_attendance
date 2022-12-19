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
        Schema::create('offices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('office_name', 100);
            $table->string('city', 50);
            $table->string('address', 200);
            $table->string('numerphone', 15);
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
        Schema::dropIfExists('offices');
    }
};
