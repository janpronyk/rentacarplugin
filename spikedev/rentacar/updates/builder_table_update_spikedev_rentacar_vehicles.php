<?php namespace Spikedev\Rentacar\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSpikedevRentacarVehicles extends Migration
{
    public function up()
    {
        Schema::table('spikedev_rentacar_vehicles', function($table)
        {
            $table->integer('price')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('spikedev_rentacar_vehicles', function($table)
        {
            $table->dropColumn('price');
        });
    }
}
