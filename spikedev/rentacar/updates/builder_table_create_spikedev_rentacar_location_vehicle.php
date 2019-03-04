<?php namespace Spikedev\Rentacar\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSpikedevRentacarLocationVehicle extends Migration
{
    public function up()
    {
        Schema::create('spikedev_rentacar_location_vehicle', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('location_id');
            $table->integer('vehicle_id');
            $table->primary(['location_id','vehicle_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('spikedev_rentacar_location_vehicle');
    }
}
