<?php

namespace App\Http\Livewire\Board\Driver;

use Livewire\Component;
use App\Models\Trip;
use App\Models\Driver;
use App\Models\Governorate;
use App\Models\PaymentMethod;
use App\Models\TripStatus;
use App\Models\City;
use Livewire\WithPagination;
use PDF;
use Excel;
use App\Exports\TripsExport;
class DriverTrips extends Component
{
	use WithPagination;
	public $search;

	public $status = 'all';
	public $payment_status = 'all' ;
	public $payment_method = 'all' ;
	public $from_delivery_date = 'all' ;
	public $to_delivery_date = 'all' ;
	public $paginate = 10;
	public $driver;
	public $total_cash_money= 0;
	public $total_kent_money= 0;
	public $total_delivery_price= 0;
	public $total_driver_income_today= 0;



	public function mount($driver)
	{

		$this->from_delivery_date = today();
		$this->to_delivery_date = today();
		$this->driver = $driver;
	}


	public function updatedSearch()
	{
		$this->resetPage();
	}

	public function updatedPaginate()
	{
		$this->resetPage();
	}

	public function updatedFromDeliveryDate()
	{
		$this->resetPage();
	}


	public function updatedToDeliveryDate()
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



	public function filterd_data() {
		$trips = Trip::query();

		$trips = $trips->where('driver_id'  , $this->driver );
		$trips = $trips->with(['market'  , 'status' , 'driver' , 'address' , 'payment_method' ]);

		if ($this->from_delivery_date != 'all')  {
			$trips = $trips->whereDate('delivery_date_to_customer', '>=', $this->from_delivery_date);
		}

		if ($this->to_delivery_date != 'all')  {
			$trips = $trips->whereDate('delivery_date_to_customer', '<=', $this->to_delivery_date);
		}
		

		if ($this->search != '') {
			$trips = $trips->where('code', $this->search);
		}


		if ($this->payment_method != 'all') {
			$trips = $trips->where('payment_method_id', $this->payment_method);
		}


		if ($this->payment_status != 'all') {
			$trips = $trips->where('paid', $this->payment_status);
		}

		if ($this->status != 'all') {
			$trips = $trips->where('status_id', $this->status);
		}
		

		$this->total_cash_money= $trips->sum('order_price');
		$this->total_kent_money= $trips->sum('order_price');
		$this->total_delivery_price= $trips->sum('delivery_price');
		$this->total_driver_income_today = $this->total_cash_money + $this->total_delivery_price;
		return $trips;

	}

	public function generateExcel() {
		$trips = $this->filterd_data();
		$trips = $trips->latest()->get();
		return Excel::download(new TripsExport($trips), 'trips.xlsx');
	}

	public function generatePDF() {
		$trips = $this->filterd_data();
		$trips = $trips->latest()->get();
		$pdfFilePath = public_path('/pdf_files/').time().'.pdf';
		PDF::loadView('board.drivers.pdf',compact('trips'))->save($pdfFilePath);
		return  response()->download($pdfFilePath);
	}

	public function render()
	{
		$trips = $this->filterd_data();
		$trips = $trips->latest()->paginate($this->paginate);
		$payment_methods = PaymentMethod::all();
		$trips_statuses = TripStatus::all();

		$driver = Driver::find($this->driver);

		// dd($driver);
		return view('livewire.board.driver.driver-trips'  ,compact('trips' ,  'payment_methods'  , 'trips_statuses'  , 'driver') );
	}
}
