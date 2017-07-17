<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuToRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_to_roles', function (Blueprint $table) {
            $table->integer('role_id')->unsigned();
            $table->integer('menu_id')->unsigned();
        });

        Schema::table('menu_to_roles', function(Blueprint $table)
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
        Schema::dropIfExists('menu_to_roles');
    }
}
