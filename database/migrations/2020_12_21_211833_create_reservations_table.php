<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('date_start');
            $table->string('hour_start');
            $table->string('date_end');
            $table->string('hour_end');
            $table->text('motif')->nullable();
            $table->text('others')->nullable();

            $table->unsignedBigInteger('salle_id')->unsigned()->index();
            $table->foreign('salle_id')->references('id')->on('salles')->onDelete('cascade');

            $table->unsignedBigInteger('departement_id')->unsigned()->index();
            $table->foreign('departement_id')->references('id')->on('departements')->onDelete('cascade');

            $table->unsignedBigInteger('status_id')->unsigned()->index();
            $table->foreign('status_id')->references('id')->on('status')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
