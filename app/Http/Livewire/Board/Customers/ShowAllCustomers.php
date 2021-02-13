<?php

namespace App\Http\Livewire\Board\Customers;

use App\Models\CustomerAddress;
use Livewire\Component;
use Livewire\WithPagination;

class ShowAllCustomers extends Component {

	use WithPagination;

	protected $paginationTheme = 'bootstrap';

	public $search   = '';
	public $paginate = 10;

	public function updatingSearch() {
		$this->resetPage();
	}

	public function updatingPaginate() {
		$this->resetPage();
	}

	protected $listeners = ['deleteItemConfirmed' => 'handleItemDeletion'];

	public function handleItemDeletion($item_id) {
		CustomerAddress::where('id', $item_id)->delete();
		$this->emit('itemDeleted', $item_id);
		$this->resetPage();
	}

	public function render() {
		$customers = CustomerAddress::with(['governorate', 'city'])
			->where('name', 'like', '%'.$this->search.'%')
			->orWhere('phone2', 'like', '%'.$this->search.'%')
			->orWhere('phone1', 'like', '%'.$this->search.'%')
			->latest()
			->paginate($this->paginate);
		return view('livewire.board.customers.show-all-customers', compact('customers'));
	}
}
