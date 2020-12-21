<?php

namespace App\Http\Livewire\Drivers;

use Livewire\Component;

class Reports extends Component
{

	public $dateFrom;
	public $dateTo;
	public $today;
	public $driver;
	public $customer;
	public $market;
	public $payment_method;
	public $city;
	public $governorate;


	public function render()
	{
		return view('livewire.drivers.reports');
	}
}
