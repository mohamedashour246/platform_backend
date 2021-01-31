<?php

namespace App\Http\Livewire\Board\Markets;

use Livewire\Component;
use App\Models\Trip;
use App\Models\Market;
use App\Models\Branch;
use App\Models\PaymentMethod;
use App\Models\TripStatus;
use Livewire\WithPagination;
use PDF;
use Excel;
use App\Exports\TripsExport;
class MartketTrips extends Component
{
	use WithPagination;
	public $search;

	public $branch = 'all';
	public $status = 'all';
	public $payment_status = 'all' ;
	public $payment_method = 'all' ;
	public $from_delivery_date = 'all' ;
	public $to_delivery_date = 'all' ;
	public $paginate = 10;
	public $market;
	public $total_cash_money= 0;
	public $total_kent_money= 0;
	public $total_delivery_price= 0;




	public function mount($market)
	{	
		

		$this->from_delivery_date = today();
		$this->to_delivery_date = today();
		$this->market = $market;
	}


	public function updatedSearch()
	{
		$this->resetPage();
	}

	public function updatedBranch()
	{
		$this->resetPage();
	}

	public function updatedStatus()
	{
		$this->resetPage();
	}


	public function updatedPaymentMethod()
	{
		$this->resetPage();
	}

	public function updatedPaymentStatus()
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

		$trips->where('market_id'  , $this->market );
		$trips->with(['market'  , 'status' , 'driver' , 'address' , 'payment_method' ]);

		if ($this->from_delivery_date != 'all')  {
			$trips->whereDate('delivery_date_to_customer', '>=', $this->from_delivery_date);
		}

		if ($this->to_delivery_date != 'all')  {
			$trips->whereDate('delivery_date_to_customer', '<=', $this->to_delivery_date);
		}


		if ($this->branch != 'all')  {
			$trips->where('branch_id',  $this->branch);
		}
		

		if ($this->search != '') {
			$trips->where('code', $this->search);
		}


		if ($this->payment_method != 'all') {
			$trips->where('payment_method_id', $this->payment_method);

		}


		if ($this->payment_status != 'all') {
			$trips->where('paid', $this->payment_status);
		}

		if ($this->status != 'all') {
			$trips->where('status_id', $this->status);
		}
		
	



		$trips = $trips->latest()->paginate($this->paginate);

		$total_delivery_price =  $trips;
		$total_kent_money =  $trips;
		$total_cash_money =  $trips;

		$this->total_delivery_price= $total_delivery_price->sum('delivery_price');
		$this->total_kent_money=$total_kent_money->where('payment_method_id' , 2)->sum('order_price');
		$this->total_cash_money=$total_cash_money->where('payment_method_id' , 1)->sum('order_price');
		return $trips;

	}

	public function generateExcel() {
		$trips = $this->filterd_data();
		// $trips = $trips->latest()->get();
		return Excel::download(new TripsExport($trips), 'trips.xlsx');
	}

	public function generatePDF() {
		$trips = $this->filterd_data();
		// $trips = $trips->latest()->get();
		$pdfFilePath = public_path('/pdf_files/').time().'.pdf';
		PDF::loadView('board.drivers.pdf',compact('trips'))->save($pdfFilePath);
		return  response()->download($pdfFilePath);
	}

    public function render()
    {
    	$trips = $this->filterd_data();
	
		$payment_methods = PaymentMethod::all();
		$trips_statuses = TripStatus::all();
		$market = Market::find($this->market);
		$branches = Branch::where('market_id'  , $this->market )->get(); 
        return view('livewire.board.markets.martket-trips'  ,  compact('trips' ,  'payment_methods'  , 'trips_statuses'  , 'market' ,'branches'));
    }
}
