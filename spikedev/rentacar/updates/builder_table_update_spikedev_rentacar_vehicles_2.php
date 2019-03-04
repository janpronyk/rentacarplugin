<?php namespace Spikedev\Rentacar\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSpikedevRentacarVehicles2 extends Migration
{
    public function up()
    {
        Schema::table('spikedev_rentacar_vehicles', function($table)
        {
            $table->boolean('available')->default(1);
        });
    }
    
    public function down()
    {
        Schema::table('spikedev_rentacar_vehicles', function($table)
        {
            $table->dropColumn('available');
        });
    }
}
