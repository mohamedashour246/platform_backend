<?php

namespace App\Http\Livewire;

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
class Trips extends Component
{

	use WithPagination;
	public $search;
    public $trip_period = 'trips_of_today';
    public $status = 'all';
    public $payment_status = 'all' ;
    public $payment_method = 'all' ;
    public $from_delivery_date = 'all' ;
    public $to_delivery_date = 'all' ;
    public $paginate = 10;



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
        $trips = $trips->with(['market'  , 'status' , 'driver' , 'address' , 'payment_method' ]);

        switch ($this->trip_period) {
            case 'trips_of_today':
            $trips = $trips->whereDate('delivery_date_to_customer' , '=' , today() );
            break;
            case 'future_trips':
            $trips = $trips->whereDate('delivery_date_to_customer' , '>' , today() );
            break;         
        }


        if ($this->trip_period == 'a_certain_period') {
             if ($this->from_delivery_date != 'all')  {
            $trips = $trips->whereDate('delivery_date_to_customer', '>=', $this->from_delivery_date);
        }

        if ($this->to_delivery_date != 'all')  {
            $trips = $trips->whereDate('delivery_date_to_customer', '<=', $this->to_delivery_date);
        }
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
        return view('livewire.trips' , compact('trips' ,  'payment_methods'  , 'trips_statuses' ));
    }
}
