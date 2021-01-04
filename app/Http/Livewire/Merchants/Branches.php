<?php

namespace App\Http\Livewire\Merchants;

use App\Models\Branch;
use Livewire\Component;

class Branches extends Component {
	public function render() {
		$branches = Branch::latest()->get();
		return view('livewire.merchants.branches');
	}
}
