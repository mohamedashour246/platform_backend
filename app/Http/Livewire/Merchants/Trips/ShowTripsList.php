<?php

namespace App\Http\Livewire\Merchants\Trips;

use App\Exports\TripsExport;
use App\Models\Branch;
use App\Models\PaymentMethod;
use App\Models\Trip;
use Excel;
use Livewire\Component;
use Livewire\WithPagination;
use PDF;
use Session;

class ShowTripsList extends Component {

	use WithPagination;

	protected $paginationTheme = 'bootstrap';
	public $search             = '';
	public $paginate           = 10;

	public $branch             = 'all';
	public $payment_method     = 'all';
	public $status             = 'all';
	public $from_delivery_date = 'all';
	public $to_delivery_date   = 'all';
	public $market_id;

	public function updatingSearch() {
		$this->resetPage();
	}

	public function updatingPaginate() {
		$this->resetPage();
	}
	public function updatingBranch() {
		$this->resetPage();
	}

	public function updatingPaymentMethod() {
		$this->resetPage();
	}
	public function updatingStatus() {
		$this->resetPage();
	}
	public function updatingFromDeliveryDate() {
		$this->resetPage();
	}

	public function updatingToDeliveryDate() {
		$this->resetPage();
	}

	public function mount() {
		$this->market_id = Session::get('market_id');
	}

	public function filterd_data() {

		$trips = Trip::where('market_id', $this->market_id);

		if ($this->branch != 'all') {
			$trips = $trips->where('branch_id', $this->branch);
		}

		if ($this->payment_method != 'all') {
			$trips = $trips->where('payment_method_id', $this->payment_method);
		}

		if ($this->status != 'all') {
			$trips = $trips->where('status', $this->status);
		}

		if ($this->from_delivery_date != 'all') {
			$trips = $trips->whereDate('delivery_date_to_customer', '>=', $this->from_delivery_date);
		}

		if ($this->to_delivery_date != 'all') {
			$trips = $trips->whereDate('delivery_date_to_customer', '<=', $this->to_delivery_date);
		}

		if ($this->search != '') {
			$trips = $trips->where('code', $this->search);
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

		return view('livewire.merchants.trips.show-trips-list', compact('trips', 'branches', 'payment_methods'));
	}
}
