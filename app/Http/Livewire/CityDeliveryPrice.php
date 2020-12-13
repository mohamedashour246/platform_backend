<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CityDeliveryPrice as Prices;
use Livewire\WithPagination;
use App\Models\City;
class CityDeliveryPrice extends Component
{


	use WithPagination;

    public $fromCity = 'all';
    public $toCity = 'all' ;
	public $paginate = 2;

	protected $paginationTheme = 'bootstrap';


	public function updatingPaginate()
    {
        $this->resetPage();
    }


    public function updatingFromCity()
    {
        $this->resetPage();
    }


    public function updatingToCity()
    {
        $this->resetPage();
    }


    protected $listeners = ['deleteItemConfirmed' => 'handleItemDeletion'];



    public function handleItemDeletion($item_id)
    {      
        Prices::where('id' , $item_id )->delete();
        $this->resetPage();
    }




    public function render()
    {
        $prices = Prices::query();

        if ($this->fromCity != 'all') {
            $prices = $prices->where('from_city' , $this->fromCity );
        }

        if ($this->toCity != 'all') {
            $prices = $prices->where('to_city' , $this->toCity );
        }

        // dd($this->prices);
    	$prices = $prices->latest()->simplePaginate($this->paginate);
        return view('livewire.city-delivery-price' , compact('prices') );
    }
}
