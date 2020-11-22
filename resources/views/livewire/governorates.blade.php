

<div class="row">
	<div class="col-md-12 mb-3">
		<div class="card">
			<div class="card-header">
				@lang('governorates.search')
			</div>
			<div class="card-body">
				<a  href="{{ route('governorates.create') }}" class="btn btn-primary float-right" >
				 <i class="icon-plus3 "></i> @lang('governorates.add_new_governorate')  </a>
				{{-- <button class="btn btn-dark float-right mr-2" data-toggle="collapse" data-target="#filters">
					<i class="icon-filter3"></i> @lang('governorates.advanced_search')
				</button> --}}
				<div class="form-group">
					<div class="row">
						<div class="col-md-12">
							<input type="text" id="search" wire:model="search" placeholder="@lang('governorates.search_governorates') ....." class="form-control" >
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="card" >
			<div class="card-header bg-dark header-elements-inline">
				<h5 class="card-title"> <i class="icon-users4 mr-1"></i> @lang('governorates.governorates')</h5>
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
							<th> @lang('governorates.name_ar') </th>
							<th> @lang('governorates.name_en') </th>
							<th> @lang('governorates.added_by') </th>
							<th> @lang('governorates.activation') </th>
							<th> @lang('governorates.created_at') </th>
							<th> @lang('governorates.settings') </th>
						</tr>
					</thead>
					<tbody>
						@php
						$i =1 ;
						@endphp
						@foreach ($governorates as $governorate)
						<tr>
							<td  >{{ $i++ }}</td>
							<td> {{ $governorate->name_ar }} </td>
							<td> {{ $governorate->name_en }} </td>

							<td> <a target="_blank" href="{{ route('admins.show'  , ['admin' => $governorate->admin_id] ) }}"> {{ optional($governorate->admin)->username }} </a> </td>
							<td>
								@switch($governorate->active)
								@case(1)
								<span class="badge badge-primary"> @lang('governorates.active') </span>
								@break
								@case(0)
								<span class="badge badge-secondary"> @lang('governorates.inactive') </span>
								@break
								@endswitch
							</td>
							<td>{{ $governorate->created_at->toFormattedDateString() }} - <span class="text-muted"> {{ $governorate->created_at->diffForHumans() }} </span> </td>
							<td>
								<a target="_blank" href="{{ route('governorates.show',['governorate' => $governorate->id ] ) }}" class="btn btn-outline bg-primary border-primary text-primary-800 btn-icon">
									<i class="icon-eye2 text-primary-800"></i>
								</a>
								<a target="_blank" href="{{ route('governorates.edit' , ['governorate' => $governorate->id ] ) }}" class="btn alpha-warning border-warning text-warning-800 btn-icon ml-2">
									<i class="icon-pencil7 text-warning-800"></i></a>
									<form action="{{ route('governorates.destroy'  , ['governorate' => $governorate->id] ) }}" class="form-inline float-right" method="POST" >
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
						{{ $governorates->links() }}
					</div>				
				</div>
			</div>



		</div>
	</div>	