<?php

namespace App\Http\Livewire\Board;

use Livewire\Component;
use App\Models\Bill;
use Livewire\WithPagination;

class Bills extends Component
{
	use WithPagination;

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



	protected $paginationTheme = 'bootstrap';
	public function render()
	{
		$bills = Bill::query()->with(['driver'  , 'type' , 'admin' ]);
		if ($this->date != 'all') {
			$bills = $bills->whereDate('created_at'  , $this->date );
		}
		$bills = $bills->latest()->paginate($this->paginate);
		return view('livewire.board.bills' , compact('bills'));
	}
}
