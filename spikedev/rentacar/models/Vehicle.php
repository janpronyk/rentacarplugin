<?php namespace Spikedev\Rentacar\Models;

use Model;

/**
 * Model
 */
class Vehicle extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'spikedev_rentacar_vehicles';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     *  Relations
     */

    public $attachOne = [
      'image' => 'System\Models\File'
    ];

     public $belongsToMany = [
         'locations' => [
             'Spikedev\Rentacar\Models\Location',
             'table' => 'spikedev_rentacar_location_vehicle',
             'order' => 'title'
         ],

         'dates' => [
             'Spikedev\Rentacar\Models\Date',
             'table' => 'spikedev_rentacar_date_vehicle',
             'order' => 'pickup_date'
         ]
     ];
}
