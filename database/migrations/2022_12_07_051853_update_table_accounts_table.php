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
        Schema::table('accounts', function (Blueprint $table) {
            //
            $table->dropForeign('accounts_created_user_foreign');
            $table->dropForeign('accounts_updated_user_foreign');
            $table->foreign('created_user')->references('id')->on('employees')->change();
            $table->foreign('updated_user')->references('id')->on('employees')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accounts', function (Blueprint $table) {
            //
        });
    }
};
