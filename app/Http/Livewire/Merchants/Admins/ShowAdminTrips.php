<?php

namespace App\Http\Livewire\Merchants\Admins;

use App\Exports\TripsExport;
use App\Models\Branch;
use App\Models\PaymentMethod;
use App\Models\Trip;
use Excel;
use Livewire\Component;
use Livewire\WithPagination;
use PDF;
use Session;

class ShowAdminTrips extends Component {

	use WithPagination;

	protected $paginationTheme = 'bootstrap';
	public $search             = '';
	public $paginate           = 10;
	public $start_date;
	public $end_date;

	public $admin_id;

	public $market_id;

	public function updatingSearch() {
		$this->resetPage();
	}

	public function updatingPaginate() {
		$this->resetPage();
	}

	public function mount() {
		$this->market_id = Session::get('market_id');
		$this->admin_id  = request()->segment(3);
	}

	protected $listeners = ['deleteItemConfirmed' => 'handleItemDeletion'];

	public function handleItemDeletion($item_id) {
		$trip = Trip::find($item_id);
		if ($trip) {
			$trip->delete();
		}
		$this->emit('itemDeleted', $item_id);
		$this->resetPage();
	}

	public function filterd_data() {

		$trips = Trip::with(['payment_method', 'branch', 'address'])->where('market_id', $this->market_id)->where('admin_id', $this->admin_id);

		if (!is_null($this->start_date)) {
			$trips = $trips->whereDate('created_at', '>=', $this->start_date);
		}

		if (!is_null($this->end_date)) {
			$trips = $trips->whereDate('created_at', '<=', $this->end_date);
		}

		return $trips->latest()->paginate($this->paginate);
	}

	public function generateExcel() {
		$trips = $this->filterd_data();
		return Excel::download(new TripsExport($trips), 'trips.xlsx');
	}

	public function generatePDF() {
		$trips = $this->filterd_data();
		return PDF::loadView('board.drivers.pdf', compact('trips'))->download('trips.pdf');
	}

	public function render() {

		$branches        = Branch::where('market_id', $this->market_id)->latest()->get();
		$payment_methods = PaymentMethod::all();

		$trips = $this->filterd_data();

		return view('livewire.merchants.admins.show-admin-trips', compact('trips', 'branches', 'payment_methods'));
	}

}
