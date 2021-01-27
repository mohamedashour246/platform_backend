<?php

namespace App\Http\Livewire\Board\Trips;

use Livewire\Component;
use App\Models\Driver;
use App\Models\Trip;
class AddDriverToTrip extends Component
{

	public $driver;
	public $trip;

	 protected $listeners = ['userAboutToChooseDriver'];

	public function userAboutToChooseDriver($trip)
    {
    	
        $this->trip = $trip;
        
    }


	public function assignDriverToTrip()
	{
		$trip = Trip::find($this->trip);
		$trip->driver_id = $this->driver;
		$trip->save();
		$this->emit('driverAddedToTrip');
	}



    public function render()
    {
    	$drivers = Driver::all();
        return view('livewire.board.trips.add-driver-to-trip' , compact('drivers'));
    }
}
