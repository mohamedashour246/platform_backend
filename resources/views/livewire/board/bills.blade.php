@php
$lang = session()->get('locale');
@endphp
<div class="card ">



	<div class="card-header bg-white header-elements-sm-inline">
		<h6 class="card-title"> @lang('bills.bills') </h6>
		<div class="header-elements col-3">
			<div class="col-md-9">
				<div class="form-group">
					<input type="date" class="form-control col-md-12"  wire:model="date" >
				</div>				
			</div>
			<div class="col-md-3">
				<select class="form-control " wire:model="paginate" >
					<option value="10">10</option>
					<option value="50">50</option>
					<option value="100">100</option>
				</select>
			</div>
		</div>
	</div>

	<table class="table  table-xs table-bordered">
		<thead class="bg-dark">
			<tr>
				<th></th>
				<th> # </th>
				<th> @lang('bills.driver') </th>
				<th> @lang('bills.admin') </th>
				<th> @lang('bills.status') </th>
				<th> @lang('bills.type') </th>
				<th> @lang('bills.comment') </th>
				<th> @lang('bills.price') </th>
				<th> @lang('bills.created_at') </th>
			</tr>
		</thead>
		<tbody>
			@php
			$i = 1;
			@endphp
			@foreach ($bills as $bill)
			<tr>
				<td>
					<a href="#collapse-icon{{ $bill->id }}" class="text-default" data-toggle="collapse">
						<i class="icon-circle-down2"></i>
					</a>
				</td>
				<td> {{ $bill->number }} </td>
				<td>  
					<a href="{{ route('drivers.show'  , ['driver' => $bill->driver_id ] ) }}"> {{ optional($bill->driver)->name }} 
					</a> 
				</td>
				<td>  
					<a href="{{ route('admins.show'  , ['admin' => $bill->admin_id ] ) }}"> {{ optional($bill->admin)->name }} 
						<span class="d-block font-weight-normal text-muted"> {{ optional(optional($bill->admin)->type)['name_'.$lang] }} </span>
					</a> 
				</td>

				<td>
					@switch($bill->status)
					@case(0)
					<span class="badge bg-warning" > @lang('bills.waiting') </span>
					@break
					@case(1)
					<span class="badge bg-success" > @lang('bills.accepted') </span>
					@break
					@case(2)
					<span class="badge bg-danger" > @lang('bills.refused') </span>
					@break
					@endswitch
				</td>
				<td>  <span class="badge badge-info font-weight-bold" > {{ optional($bill->type)['type_'.$lang] }} </span> </td>
				<td> {{ $bill->comment }} </td>
				<td> {{ $bill->price }} </td>
				<td> 
					<span data-popup="tooltip" title="{{ $bill->created_at->diffForHumans() }}" >  
						{{ $bill->created_at->toFormattedDateString() }} 
					</span> 
				</td>

			</tr>



			<tr class="collapse " id="collapse-icon{{ $bill->id }}" >
				<td colspan="100%" >

					<div class="float-left">
						@lang('bills.settings') :
						<a target="_blank" href="{{ route('bills.show'  , ['bill' => $bill->id ] ) }}"
							class="btn btn-outline bg-primary border-primary text-primary-800 btn-icon">
							<i class="icon-eye2 "></i>
						</a>

					</div>
				</td>
			</tr>





			@endforeach
		</tbody>
	</table>

	<div class="card-footer">
		<div class="pull-left">
			{{ $bills->links() }}
		</div>
	</div>
</div>