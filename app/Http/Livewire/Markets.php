<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Market;

class Markets extends Component
{

	use WithPagination;

	public $search;
	public $paginate = 2;


    
    public function updatingSearch()
    {
        $this->resetPage();
    }


	protected $paginationTheme = 'bootstrap';


    public function render()
    {
    	$markets = Market::with('admin')->where('name', 'like', '%' . $this->search . '%' )->latest()->simplePaginate($this->paginate);
        return view('livewire.markets' , compact('markets') );
    }
}
