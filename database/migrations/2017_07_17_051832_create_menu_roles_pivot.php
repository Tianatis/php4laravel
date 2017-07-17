<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuRolesPivot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_role', function (Blueprint $table) {
            $table->integer('role_id')->unsigned()->nullable();
            $table->integer('menu_id')->unsigned()->nullable();
        });

        Schema::table('menu_role', function(Blueprint $table)
        {
            $table->foreign('role_id')->references('id')->on('roles')->on_delete('cascade');
            $table->foreign('menu_id')->references('id')->on('menu')->on_delete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_role');
    }
}
