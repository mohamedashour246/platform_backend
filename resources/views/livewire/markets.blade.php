

<div class="row">
	<div class="col-md-12 mb-3">
		<div class="card">
			<div class="card-header">
				@lang('markets.search')
			</div>
			<div class="card-body">
				<a  href="{{ route('markets.create') }}" class="btn btn-primary float-right" > <i class="icon-plus3 "></i> @lang('markets.add_new_market')  </a>
				{{-- <button class="btn btn-dark float-right mr-2" data-toggle="collapse" data-target="#filters">
					<i class="icon-filter3"></i> @lang('markets.advanced_search')
				</button> --}}
				<div class="form-group">
					<div class="row">
						<div class="col-md-12">
							<input type="text" id="search" wire:model="search" placeholder="@lang('markets.search_markets') ....." class="form-control" >
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
							<label> @lang('markets.activation') </label>
							<select id="active" class="form-control" wire:model="active" >
								<option value="1"> @lang('markets.active') </option>
								<option value="0"> @lang('markets.inactive') </option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label> @lang('markets.availability') </label>
							<select id="available" class="form-control"  wire:model="available">
								<option value="1"> @lang('markets.available') </option>
								<option value="0"> @lang('markets.unavailable') </option>
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
				<h5 class="card-title"> <i class="icon-users4 mr-1"></i> @lang('markets.markets')</h5>
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
							<th> @lang('markets.logo') </th>
							<th> @lang('markets.market_name') </th>
							<th> @lang('markets.address') </th>
							<th> @lang('markets.phones') </th>
							<th> @lang('markets.added_by') </th>
							<th> @lang('markets.activation') </th>
							<th> @lang('markets.created_at') </th>
							<th> @lang('markets.settings') </th>
						</tr>
					</thead>
					<tbody>
						@php
						$i =1 ;
						@endphp
						@foreach ($markets as $market)
						<tr>
							<td  >{{ $i++ }}</td>
							<td > <img class="img-thumbnail" width="50" height="50" src="{{ Storage::disk('s3')->url('markets/'.$market->logo) }}" alt=""> </td>
							<td> <a href="{{ route('markets.show'  , ['market' => $market->id] ) }}">  {{ $market->name }} </a> </td>
							<td> {{ $market->address }} </td>
							<td> {{ $market->phones }} </td>

							<td> <a target="_blank" href="{{ route('admins.show'  , ['admin' => $market->admin_id] ) }}"> {{ optional($market->admin)->username }} </a> </td>
							<td>
								@switch($market->active)
								@case(1)
								<span class="badge badge-primary"> @lang('markets.active') </span>
								@break
								@case(0)
								<span class="badge badge-secondary"> @lang('markets.inactive') </span>
								@break
								@endswitch
							</td>
							<td>{{ $market->created_at->toFormattedDateString() }} - <span class="text-muted"> {{ $market->created_at->diffForHumans() }} </span> </td>
							<td>
								<a target="_blank" href="{{ route('markets.show'  , ['market' => $market->id ] ) }}" class="btn btn-outline bg-primary border-primary text-primary-800 btn-icon">
									<i class="icon-eye2 text-primary-800"></i>
								</a>
								<a target="_blank" href="{{ route('markets.edit' , ['market' => $market->id ] ) }}" class="btn alpha-warning border-warning text-warning-800 btn-icon ml-2">
									<i class="icon-pencil7 text-warning-800"></i></a>
								<form action="{{ route('markets.destroy'  , ['market' => $market->id] ) }}" class="form-inline float-right" method="POST" >
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-outline bg-danger border-danger text-danger-800 btn-icon border-2 ml-2"><i class="icon-trash"></i></button>
								</form>
							</td>
						</tr>

						@endforeach

					</tbody>
				</table>
			</div>


			<div class="card-footer bg-light ">
				<div class="float-right" >
					{{ $markets->links() }}
				</div>				
			</div>
		</div>



	</div>
</div>	