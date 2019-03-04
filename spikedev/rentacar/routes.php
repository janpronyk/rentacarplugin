<?php

use Spikedev\Rentacar\Models\Vehicle;
use Spikedev\Rentacar\Models\Location;
use \Carbon\Carbon;
use Spikedev\Rentacar\Models\Reservation;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;


Route::get('api/v1/vehicles', function() {
	$vehicles = Vehicle::with(['locations', 'image', 'dates'])->get();
	return $vehicles;
});

Route::get('api/v1/vehicles/detail/{slug}', function($slug) {
	$vehicle = Vehicle::with(['locations', 'image'])
                        ->where('slug', '=', $slug)
                        ->first();
	return $vehicle;
});

Route::get('api/v1/locations', function() {
	$locations = Location::all();
	return $locations;
});

Route::get('api/v1/locations/options', function() {
	$locations = Location::all();
	foreach ($locations as $location ) {
		$location['label'] = $location['title'];
		$location['value'] = $location['id'];
		
		unset($location['title']);
		unset($location['id']);
		unset($location['slug']);
	}
	return $locations;
});

Route::get('api/v1/vehicles/filter/locations/{id?}/{pickupdate?}/{dropoffdate?}', function($id=null, $pickupdate=null, $dropoffdate=null) {

    if ( is_null($id) ) {
        $vehicles = Vehicle::with(['locations', 'image', 'dates'])->get();
        return $vehicles;
    } else {
        $vehicles = Vehicle::with(['image', 'locations', 'dates'])->whereHas('locations', function ($query) use ($id) {
            $query->where('id', '=', $id);
        })->get();
        return $vehicles;
	}
	
//    $filteredVehicles = $vehicles->each(function ($vehicle, $key, $pickupdate=null, $dropoffdate=null) {
//        foreach ($vehicle->dates as $date) {
//            if (!is_null($date)) {
//                $startDate1 = Carbon::parse($pickupdate);
//                $endDate1 = Carbon::parse($dropoffdate);
//                $startDate2 = Carbon::parse($date->pickup_date);
//                $endDate2 = Carbon::parse($date->drop_date);
//                if(($startDate1 < $endDate2) && ($startDate2 < $endDate1)) {
//                    $vehicle->available = 0;
//                    return;
//                }
//            }
//        }
//    });
    return $vehicles;
});

Route::middleware(['jwt.auth'])->group(function(){
	Route::post('api/v1/reservation', function(Request $request) {
		$reservation = new Reservation;
		$reservation->pickup_date = $request->pickupDate;
		$reservation->dropoff_date = $request->dropoffDate;
		$reservation->user_id = $request->user_id;
		$reservation->vehicle_id = $request->vehicle_id;
		$reservation->save();
		return response()->json('Reservation created');
	});
});
