<div class="row">
	
	<div class="col-md-12">


		<div class="row">
{{-- 			<div class="col-md-2">
				<div class="input-group mb-3">
					<div class="form-group-feedback form-group-feedback-left">
						<input type="text"  wire:model="search" class="form-control form-control-lg text-center" placeholder="@lang('admins.search_admins')">
						<div class="form-control-feedback form-control-feedback-lg">
							<i class="icon-search4 text-muted"></i>
						</div>
					</div>
				</div>
			</div> --}}
			<div class="col-md-12 mb-3">
				<a  href="{{ route('admins.create') }}" class="btn btn-primary float-right" > <i class="icon-user-plus "></i>@lang('admins.add_new_admin') </a>
			</div>
		</div>

		<div class="card" >
			<div class="card-header bg-dark header-elements-inline">
				<h5 class="card-title"> <i class="icon-users4 mr-1"></i> @lang('admins.admins')</h5>
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
							<th> @lang('admins.picture') </th>
							<th> @lang('admins.username') </th>
							<th> @lang('admins.email') </th>
							<th> @lang('admins.type') </th>
							<th> @lang('admins.added_by') </th>
							<th> @lang('admins.activation') </th>
							<th> @lang('admins.created_at') </th>
							<th> @lang('admins.settings') </th>
						</tr>
					</thead>
					<tbody>
						@php
						$i =1 ;
						@endphp
						@foreach ($admins as $admin)
						<tr>
							<td  >{{ $i++ }}</td>
							<td > <img class="img-thumbnail" width="50" height="50" src="{{ Storage::disk('s3')->url('admins/'.$admin->image) }}" alt=""> </td>
							<td  > <a href="{{ route('admins.show', ['admin' => $admin->id])}}"> {{ $admin->username }} </a> </td>
							<td >{{ $admin->email }}</td>
							<td> <span class="badge badge-primary" >  @lang('admins.'.$admin->type)  </span> </td>
							<td> <a target="_blank" href="{{ route('admins.show'  , ['admin' => $admin->admin_id] ) }}"> {{ optional($admin->addedBy)->username }} </a> </td>
							<td>
								@switch($admin->active)
								@case(1)
								<span class="badge badge-success"> @lang('admins.active') </span>
								@break
								@case(0)
								<span class="badge badge-secondary"> @lang('admins.inactive') </span>
								@break
								@endswitch
							</td>
							<td>{{ $admin->created_at->toFormattedDateString() }} - <span class="text-muted"> {{ $admin->created_at->diffForHumans() }} </span> </td>
							<td></td>
						</tr>

						@endforeach

					</tbody>
				</table>
			</div>


			<div class="card-footer bg-light ">
				<div class="float-right" >
					{{ $admins->links() }}
				</div>				
			</div>
		</div>



	</div>
</div>	