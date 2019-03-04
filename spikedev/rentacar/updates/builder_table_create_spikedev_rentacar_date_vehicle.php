<?php namespace Spikedev\Rentacar\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSpikedevRentacarDateVehicle extends Migration
{
    public function up()
    {
        Schema::create('spikedev_rentacar_date_vehicle', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('vehicle_id');
            $table->integer('date_id');
            $table->primary(['vehicle_id','date_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('spikedev_rentacar_date_vehicle');
    }
}
