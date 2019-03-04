<?php namespace Spikedev\Rentacar\Models;

use Model;

/**
 * Model
 */
class Reservation extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'spikedev_rentacar_reservations';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * Relations
     */

     public $belongsTo = [
         'vehicle' => 'Spikedev\Rentacar\Models\Vehicle',
         'user' => 'Rainlab\User\Models\User',
     ];
}
