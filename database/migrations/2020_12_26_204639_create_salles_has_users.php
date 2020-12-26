<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSallesHasUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salles_has_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('salle_id')->unsigned();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('salle_id')
                ->references('id')->on('salles')->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salles_has_users');
    }
}
