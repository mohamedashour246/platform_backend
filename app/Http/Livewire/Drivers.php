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


	public function updatingSearch()
    {
        $this->resetPage();
    }


    public function render()
    {

    	$drivers = Driver::query();
    	$drivers->with(['admin'  , 'country' ]);
    	if (!empty($this->active)) {
    		$drivers->where('active' , $this->active );
    	}

    	if (!empty($this->available)) {
    		$drivers->where('available' , $this->available );
    	}

    	if (!empty($this->search)) {
    		$drivers->where('name', 'like', '%' . $this->search . '%' );
    	}

    	$drivers = $drivers->latest()->simplePaginate($this->paginate);
        return view('livewire.drivers' , compact('drivers') );
    }
}
