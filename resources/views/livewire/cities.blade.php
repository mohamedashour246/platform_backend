@php
	$lang = session()->get('locale');
@endphp

<div class="row">
	<div class="col-md-12 mb-3">
		<div class="card">
			<div class="card-header">
				@lang('cities.search')
			</div>
			<div class="card-body">
				<a  href="{{ route('cities.create') }}" class="btn btn-primary float-right" >
				 <i class="icon-plus3 "></i> @lang('cities.add_new_city')  </a>
				{{-- <button class="btn btn-dark float-right mr-2" data-toggle="collapse" data-target="#filters">
					<i class="icon-filter3"></i> @lang('cities.advanced_search')
				</button> --}}
				<div class="form-group">
					<div class="row">
						<div class="col-md-12">
							<input type="text" id="search" wire:model="search" placeholder="@lang('cities.search_cities') ....." class="form-control" >
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="card" >
			<div class="card-header bg-dark header-elements-inline">
				<h5 class="card-title"> <i class="icon-city mr-1"></i> @lang('cities.cities')</h5>
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
							<th> @lang('cities.name_ar') </th>
							<th> @lang('cities.name_en') </th>
							<th> @lang('cities.governorate') </th>
							<th> @lang('cities.added_by') </th>
							<th> @lang('cities.activation') </th>
							<th> @lang('cities.created_at') </th>
							<th> @lang('cities.settings') </th>
						</tr>
					</thead>
					<tbody>
						@php
						$i =1 ;
						@endphp
						@foreach ($cities as $city)
						<tr>
							<td  >{{ $i++ }}</td>
							<td> {{ $city->name_ar }} </td>
							<td> {{ $city->name_en }} </td>


							<td> {{ optional($city->governorate)['name_'.$lang] }} </td>

							<td> <a target="_blank" href="{{ route('admins.show'  , ['admin' => $city->admin_id] ) }}"> {{ optional($city->admin)->username }} </a> </td>
							<td>
								@switch($city->active)
								@case(1)
								<span class="badge badge-primary"> @lang('cities.active') </span>
								@break
								@case(0)
								<span class="badge badge-secondary"> @lang('cities.inactive') </span>
								@break
								@endswitch
							</td>
							<td>{{ $city->created_at->toFormattedDateString() }} - <span class="text-muted"> {{ $city->created_at->diffForHumans() }} </span> </td>
							<td>
								<a target="_blank" href="{{ route('cities.show',['city' => $city->id ] ) }}" class="btn btn-outline bg-primary border-primary text-primary-800 btn-icon">
									<i class="icon-eye2 text-primary-800"></i>
								</a>
								<a target="_blank" href="{{ route('cities.edit' , ['city' => $city->id ] ) }}" class="btn alpha-warning border-warning text-warning-800 btn-icon ml-2">
									<i class="icon-pencil7 text-warning-800"></i></a>
									<form action="{{ route('cities.destroy'  , ['city' => $city->id] ) }}" class="form-inline float-right" method="POST" >
										@csrf
										@method('DELETE')
										<button type="submit" class="btn btn-outline bg-danger border-danger text-danger-800 btn-icon border-2 "><i class="icon-trash"></i></button>
									</form>
								</td>
							</tr>

							@endforeach

						</tbody>
					</table>
				</div>


				<div class="card-footer bg-light ">
					<div class="float-right" >
						{{ $cities->links() }}
					</div>				
				</div>
			</div>



		</div>
	</div>	