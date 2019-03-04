<?php namespace Spikedev\Rentacar\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSpikedevRentacarReservations extends Migration
{
    public function up()
    {
        Schema::create('spikedev_rentacar_reservations', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->dateTime('pickup_date')->nullable();
            $table->dateTime('dropoff_date')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('vehicle_id')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('spikedev_rentacar_reservations');
    }
}
