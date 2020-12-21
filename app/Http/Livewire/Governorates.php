<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Governorate;
class Governorates extends Component
{


	use WithPagination;


	public $search;
	public $paginate = 2;
	public $active;

	protected $paginationTheme = 'bootstrap';


	public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPaginate()
    {
        $this->resetPage();
    }



    protected $listeners = ['deleteItemConfirmed' => 'handleItemDeletion'];

    public function handleItemDeletion($item_id)
    {
        Governorate::where('id' , $item_id )->delete();
        $this->emit('itemDeleted' , $item_id);
        $this->resetPage();
    }




    public function render()
    {
    	$governorates =  Governorate::latest()->where('name_ar', 'like', '%' . $this->search . '%')->orWhere('name_en', 'like', '%' . $this->search . '%')->simplePaginate($this->paginate);
        return view('livewire.governorates' , compact('governorates'));
    }
}
