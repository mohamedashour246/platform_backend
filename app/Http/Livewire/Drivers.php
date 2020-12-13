<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Driver;
use Livewire\WithPagination;
class Drivers extends Component
{

	use WithPagination;


	public $search;
	public $paginate = 2;
	public $available;
	public $active;
    public $sort;

    protected $paginationTheme = 'bootstrap';


    public function updatingSearch()
    {
        $this->resetPage();
    }



    protected $listeners = ['deleteItemConfirmed' => 'handleItemDeletion'];



    public function handleItemDeletion($item_id)
    {


        $this->emit('itemDeleted' , $item_id);
        // Driver::where('id' , $item_id )->delete();
        // $this->resetPage();
    }





    public function render()
    {

    	$drivers = Driver::query();
    	$drivers->with(['admin'  , 'country' ]);
    	if (!empty($this->active)) {
    		$drivers->where('active' , $this->active );
    	}

    	if (!empty($this->available)) {
    		$drivers->where('available' , $this->available );
    	}

    	if (!empty($this->search)) {
    		$drivers->where('name', 'like', '%' . $this->search . '%' );
    	}

        if ($this->sort) {
            switch ($this->sort) {
                case 'SortByStartTimeASC':
                $drivers = $drivers->orderBy('working_start_time' , 'ASC');
                break;
                case 'SortByStartTimeDESC':
                $drivers = $drivers->orderBy('working_start_time' , 'DESC');
                break;
                case 'SortByEndTimeASC':
                $drivers = $drivers->orderBy('working_end_time' , 'ASC');
                break;
                case 'SortByEndTimeDESC':
                $drivers = $drivers->orderBy('working_end_time' , 'DESC');
                break;
                case 'available':
                $drivers = $drivers->where('available' , 1);
                break;
                default:
                    // code...
                break;
            }
        } else {
            $drivers = $drivers->latest();
        }

        $drivers = $drivers->simplePaginate($this->paginate);
        return view('livewire.drivers' , compact('drivers') );
    }
}
