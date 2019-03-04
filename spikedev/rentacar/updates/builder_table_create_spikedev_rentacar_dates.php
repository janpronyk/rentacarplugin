<?php namespace Spikedev\Rentacar\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSpikedevRentacarDates extends Migration
{
    public function up()
    {
        Schema::create('spikedev_rentacar_dates', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->dateTime('pickup_date')->nullable();
            $table->dateTime('drop_date')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('spikedev_rentacar_dates');
    }
}
