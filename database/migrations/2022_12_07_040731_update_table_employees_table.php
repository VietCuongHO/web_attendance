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
        Schema::table('employees', function (Blueprint $table) {
            //
            $table->dropForeign('employees_create_user_foreign');
            $table->dropForeign('employees_update_user_foreign');
            $table->foreign('created_user')->references('id')->on('employees')->cascadeOnDelete()->change();
            $table->foreign('updated_user')->references('id')->on('employees')->cascadeOnDelete()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            //
        });
    }
};
