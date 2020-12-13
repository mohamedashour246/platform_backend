

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
								<a target="_blank"  data-popup="tooltip" title="@lang('governorates.governorate_details')" href="{{ route('governorates.show',['governorate' => $governorate->id ] ) }}" class="btn btn-outline bg-primary border-primary text-primary-800 btn-icon">
									<i class="icon-eye2 text-primary-800"></i>
								</a>
								<a target="_blank"  data-popup="tooltip" title="@lang('governorates.delivery_prices')" href="{{ route('governorates.delivery_prices.index',['governorate' => $governorate->id ] ) }}" class="btn btn-outline bg-primary border-info text-info-800 btn-icon ml-2">
									<i class="icon-cash3 text-info-800"></i>
								</a>
								<a target="_blank"  data-popup="tooltip" title="@lang('governorates.add_delivery_prices_to_governorate')" href="{{ route('governorates.delivery_prices.create',['governorate' => $governorate->id ] ) }}" class="btn btn-outline bg-primary border-primary text-primary-800 btn-icon ml-2">
									<i class="icon-plus3 text-primary-800"></i>
								</a>
								<a target="_blank"  data-popup="tooltip" title="@lang('governorates.edit')" href="{{ route('governorates.edit' , ['governorate' => $governorate->id ] ) }}" class="btn alpha-warning border-warning text-warning-800 btn-icon ml-2">
									<i class="icon-pencil7 text-warning-800"></i>
								</a>

								<a href="" data-id="{{ $governorate->id }}"  data-popup="tooltip" title="@lang('governorates.delete_governorate')" class=" delete_item btn btn-outline bg-danger border-danger text-danger-800 btn-icon border-2 ml-2"><i class="icon-trash"></i>  </a>								
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




<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
	$(document).ready(function() {
		const Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000,
			timerProgressBar: true,
			didOpen: (toast) => {
				toast.addEventListener('mouseenter', Swal.stopTimer)
				toast.addEventListener('mouseleave', Swal.resumeTimer)
			}
		})

		Livewire.on('itemDeleted', itemId => {
			Toast.fire({
				icon: 'success',
				title: "@lang('governorates.deleted_success')", 
			});
		})

		$(document).on('click', 'a.delete_item' ,  function(event) {
			event.preventDefault();
			item_id = $(this).data('id');
			confirm_deletion(item_id);
		});

		function confirm_deletion(item_id) {
			Swal.fire({
				title: 'تاكيد الحذف ',
				text: "هل انت متاكد من حذف هذه المحافظه ؟",
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'نعم',
				cancelButtonText: 'لا',
			}).then((result) => {
				if (result.isConfirmed) {
					Livewire.emit('deleteItemConfirmed'  , item_id );
				}
			})
		}

	});




</script>