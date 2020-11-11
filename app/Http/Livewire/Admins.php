<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Admin;
use Livewire\WithPagination;
class Admins extends Component
{
	 use WithPagination;


	public $search;
	public $paginate = 2;


	protected $paginationTheme = 'bootstrap';


    public function render()
    {
    	$admins = Admin::with('addedBy')->where('username', 'like', '%' . $this->search . '%' )->latest()->simplePaginate($this->paginate);
        return view('livewire.admins' , compact('admins') );
    }



    // public function paginationView()
    // {
    //     return 'livewire.admins-pagination-links-view';
    // }

}
