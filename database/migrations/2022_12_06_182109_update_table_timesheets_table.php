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
        Schema::table('timesheets', function (Blueprint $table) {
            //
            $table->renameColumn('create_at', 'created_at');
            $table->renameColumn('create_user', 'created_user');
            $table->renameColumn('update_at', 'updated_at');
            $table->renameColumn('update_user', 'updated_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('timesheets', function (Blueprint $table) {
            //
        });
    }
};
