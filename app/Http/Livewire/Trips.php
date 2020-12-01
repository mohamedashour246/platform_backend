<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Trip;
use App\Models\Driver;
use App\Models\Governorate;
use App\Models\City;
use Livewire\WithPagination;
class Trips extends Component
{

	use WithPagination;


	public $search;
	public $paginate = 2;


    
    public function updatingSearch()
    {
        $this->resetPage();
    }


	protected $paginationTheme = 'bootstrap';

	public function mount()
	{
		
	}

    public function render()
    {
    	$trips = Trip::with(['market' , 'branch'])->latest()->where('code' ,  'like', '%' . $this->search . '%' )->simplePaginate($this->paginate);


    	$cities = City::all();
    	$governorates = Governorate::all();
    	$drivers = Driver::all();

        return view('livewire.trips' , compact('trips' , 'cities' , 'governorates' , 'drivers'));
    }
}
