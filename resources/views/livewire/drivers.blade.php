

<div class="row">
	<div class="col-md-12 mb-3">
		<div class="card">
			<div class="card-header">
				@lang('drivers.search')
			</div>
			<div class="card-body">
				<a  href="{{ route('drivers.create') }}" class="btn btn-dark float-right" > <i class="icon-user-plus "></i> @lang('drivers.add_new_driver')  </a>
				<button type="button" class="btn btn-dark float-right mr-2" data-toggle="collapse" data-target="#filters">
					<i class="icon-filter3"></i> @lang('drivers.advanced_search')
				</button>
				<div class="form-group">
					<div class="row">
						<div class="col-md-12">
							<input type="text" id="search" wire:model="search" placeholder="@lang('drivers.search_drivers') ....." class="form-control" >
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-12 collapse" id="filters" >
		
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label> @lang('drivers.activation') </label>
							<select id="active" class="form-control" wire:model="active" >
								<option value="1"> @lang('drivers.active') </option>
								<option value="0"> @lang('drivers.inactive') </option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label> @lang('drivers.availability') </label>
							<select id="available" class="form-control"  wire:model="available">
								<option value="1"> @lang('drivers.available') </option>
								<option value="0"> @lang('drivers.unavailable') </option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-md-12">
		<div class="card" >
			<div class="card-header bg-dark header-elements-inline">
				<h5 class="card-title"> <i class="icon-users4 mr-1"></i> @lang('drivers.drivers')</h5>
				<div class="header-elements">
					<div class="wmin-200">
						<select class="form-control form-control-select2 select" wire:model="paginate" >
							<option value="2">2 </option>
							<option value="15">15 </option>
							<option value="30">30</option>
							<option value="50">50</option>
							<option value="70">70</option>
							<option value="100">100</option>
							<option value="150">150</option>
						</select>
					</div>
				</div>
			</div>

			<div class="card-body">
				<table class="table datatable-responsive  text-center   table-hover ">
					<thead>
						<tr>
							<th>#</th>
							<th> @lang('drivers.picture') </th>
							<th> @lang('drivers.driver_name') </th>
							<th> @lang('drivers.code') </th>
							<th> @lang('drivers.availability') </th>
							<th> @lang('drivers.added_by') </th>
							<th> @lang('drivers.activation') </th>
							<th> @lang('drivers.created_at') </th>
							<th> @lang('drivers.settings') </th>
						</tr>
					</thead>
					<tbody>
						@php
						$i =1 ;
						@endphp
						@foreach ($drivers as $driver)
						<tr>
							<td  >{{ $i++ }}</td>
							<td > <img class="img-thumbnail" width="50" height="50" src="{{ Storage::disk('s3')->url('drivers/'.$driver->image) }}" alt=""> </td>
							<td> {{ $driver->name }} </td>
							<td> {{ $driver->code }} </td>
							<td>
								@switch($driver->available)
								@case(1)
								<span class="badge badge-success"> @lang('drivers.available') </span>
								@break
								@case(0)
								<span class="badge badge-danger"> @lang('drivers.unavailable') </span>
								@break
								@endswitch
							</td>
							<td> <a target="_blank" href="{{ route('admins.show'  , ['admin' => $driver->admin_id] ) }}"> {{ optional($driver->admin)->username }} </a> </td>
							<td>
								@switch($driver->active)
								@case(1)
								<span class="badge badge-primary"> @lang('drivers.active') </span>
								@break
								@case(0)
								<span class="badge badge-secondary"> @lang('drivers.inactive') </span>
								@break
								@endswitch
							</td>
							<td>{{ $driver->created_at->toFormattedDateString() }} - <span class="text-muted"> {{ $driver->created_at->diffForHumans() }} </span> </td>
							<td></td>
						</tr>

						@endforeach

					</tbody>
				</table>
			</div>


			<div class="card-footer bg-light ">
				<div class="float-right" >
					{{ $drivers->links() }}
				</div>				
			</div>
		</div>



	</div>
</div>	