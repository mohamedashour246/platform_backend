<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CityDeliveryPrice as Prices;
use Livewire\WithPagination;
class CityDeliveryPrice extends Component
{


	use WithPagination;



	public $paginate = 2;

	protected $paginationTheme = 'bootstrap';


	public function updatingPaginate()
    {
        $this->resetPage();
    }





    public function render()
    {
    	$prices = Prices::latest()->simplePaginate($this->paginate);
        return view('livewire.city-delivery-price' , compact('prices'));
    }
}
