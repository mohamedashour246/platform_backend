<?php

namespace App\Http\Livewire\Board\Drivers;

use Livewire\Component;
use App\Models\Bill;
use App\Models\Driver;
use Livewire\WithPagination;
class Bills extends Component
{

	use WithPagination;
	public $driver;
	public $paginate = 10;
	public $date = 'all';



	public function updatedPaginate()
	{
		$this->resetPage();
	}



	public function updatedDate()
	{
		$this->resetPage();
	}


	public function mount($driver)
	{
		// dd($driver);
		$this->driver = $driver;
	}


	protected $paginationTheme = 'bootstrap';
	public function render()
	{
		

		$bills = Bill::query()->with(['driver'  , 'type' , 'admin' ])->where('driver_id' , $this->driver->id );
		if ($this->date != 'all') {
			$bills = $bills->whereDate('created_at'  , $this->date );
		}
		$bills = $bills->latest()->paginate($this->paginate);
		return view('livewire.board.drivers.bills' , compact('bills' ));
	}


    
}
