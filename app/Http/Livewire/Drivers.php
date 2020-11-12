<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Driver;
use Livewire\WithPagination;
class Drivers extends Component
{

	use WithPagination;


	public $search;
	public $paginate = 2;
	public $available;
	public $active;

	protected $paginationTheme = 'bootstrap';

    public function render()
    {

    	$drivers = Driver::query();
    	$drivers->with(['admin'  , 'country' ]);
    	if ($this->active) {
    		// dd($this->active);

    		$drivers->where('active' , $this->active );
    	}

    	if ($this->available) {
    		// dd($this->available);
    		$drivers->where('available' , $this->available );
    	}


    	$drivers = $drivers->where('name', 'like', '%' . $this->search . '%' )->latest()->simplePaginate($this->paginate);
        return view('livewire.drivers' , compact('drivers') );
    }
}
