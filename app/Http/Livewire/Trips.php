<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Trip;
use App\Models\Driver;
use App\Models\Governorate;
use App\Models\PaymentMethod;
use App\Models\City;
use Livewire\WithPagination;
class Trips extends Component
{

	use WithPagination;
	public $search;
    public $filter_type;
    public $filter_value;
    public $tripsStatus;
	public $paginate = 10;
    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function updatedPaginate()
    {
        $this->resetPage();
    }

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['deleteItemConfirmed' => 'handleItemDeletion'  , 'driverAddedToTrip' => '$refresh'];

    public function handleItemDeletion($item_id)
    {
        $this->emit('itemDeleted' , $item_id);
        $this->resetPage();
    }

    public function render()
    {

        // dd($this->tripsStatus , $this->tripsType);
    	$trips = Trip::whereDate('delivery_date_to_customer' , '=' , today() )->with(['market' , 'branch'])->latest()->where('code' ,  'like', '%' . $this->search . '%' )->paginate($this->paginate);
    	$cities = City::all();
    	$governorates = Governorate::all();
        $payment_methods = PaymentMethod::all();
        return view('livewire.trips' , compact('trips' , 'cities' , 'governorates' , 'payment_methods'));
    }
}
