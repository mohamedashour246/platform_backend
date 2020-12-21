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


    
    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $listeners = ['deleteAdminConfirmed' => 'handleAdminDeletion'];



    public function handleAdminDeletion($admin_id)
    {
        Admin::where('id' , $admin_id )->delete();
        $this->resetPage();
    }


	protected $paginationTheme = 'bootstrap';


    public function render()
    {
    	$admins = Admin::with('addedBy')->where('username', 'like', '%' . $this->search . '%' )->latest()->simplePaginate($this->paginate);
        return view('livewire.admins' , compact('admins') );
    }



}
