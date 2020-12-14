<?php

namespace App\Http\Livewire\Customers;

use Livewire\Component;
use App\Models\Governorate;
class AddCustomer extends Component
{



    public function render()
    {
    	$governorates = Governorate::where('active' , 1)->get();
        return view('livewire.customers.add-customer' , compact('governorates'));
    }
}
