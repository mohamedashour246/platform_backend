@php
$lang = session()->get('locale');
@endphp

<div class="row">
	<div class="col-md-12 mb-3">
		<div class="card">
			<div class="card-header">
				@lang('trips.search')
			</div>
			<div class="card-body">
				<a  href="{{ route('trips.create') }}" class="btn btn-primary float-right" >
					<i class="icon-plus3 "></i> @lang('trips.add_new_trip')  </a>
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<input type="text" id="search" wire:model="search" placeholder="@lang('trips.search_trips') ....." class="form-control" >
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="card" >
				<div class="card-header  header-elements-inline">
					<h5 class="card-title"> <i class="icon-users4 mr-1"></i> @lang('trips.trips')</h5>
					<div class="header-elements">
						<div class="wmin-200">
							<select class="form-control form-control-select2 select" wire:model="paginate" >
								<option value="10">10 </option>
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

				<table class="table datatable-responsive  table-bordered text-center   table-hover ">
					<thead>
						<tr>
							<th></th>
							<th>#</th>
							<th> @lang('trips.sender') </th>
							<th> @lang('trips.receiver') </th>
							<th> @lang('trips.receipt_date_from_market') </th>
							<th> @lang('trips.delivery_date_to_customer') </th>
							<th> @lang('trips.driver') </th>
							<th> @lang('trips.status') </th>
							<th> @lang('trips.payment_method') </th>
							<th> @lang('trips.payment_status') </th>
							<th> @lang('trips.order_price') </th>
							<th> @lang('trips.delivery_price') </th>
						</tr>
					</thead>
					<tbody>
						@php
						$i =1 ;
						@endphp
						@foreach ($trips as $trip)
						<tr>
							<td>
								<a href="#collapse-icon{{ $trip->id }}" class="text-default" data-toggle="collapse">
									<i class="icon-circle-down2"></i>
								</a>
							</td>
							<td  >{{ $i++ }}</td>

							<td> {{ optional($trip->market)->name }} </td>
							<td> {{ optional($trip->address)->name }} </td>
							<td> {{ $trip->receipt_date_from_market->toDayDateTimeString() }} </td>
							<td> {{ $trip->delivery_date_to_customer->toDayDateTimeString() }} </td>
							<td> 

								@if (is_null($trip->driver))
								<a href="#" class="btn btn-outline bg-grey border-grey text-grey-600 btn-icon rounded-round border-2"><i class="icon-plus2"></i></a>
								@else
								{{ optional($trip->driver)->name }} </td>
								
								@endif
								<td>
									@switch($trip->status)
									@case(1)
									<span class="badge badge-primary"> @lang('trips.proccessing') </span>
									@break
									@case(0)
									<span class="badge badge-secondary"> @lang('trips.inactive') </span>
									@break
									@endswitch
								</td>
								<td> <span class="badge badge-info"> {{ optional($trip->payment_method)['name_'.$lang] }} </span>  </td>
								<td>
									@switch($trip->paid)
									@case(1)
									<span class="badge badge-primary"> @lang('trips.payment_completed') </span>
									@break
									@case(0)
									<span class="badge badge-secondary"> @lang('trips.payment_completed') </span>
									@break
									@endswitch
								</td>
								<td> {{ $trip->order_price }} </td>
								<td> {{ $trip->delivery_price }} </td>
								
							</tr>

							<tr class="collapse " id="collapse-icon{{ $trip->id }}" >
								<td colspan="100%" >


									<div class="float-left">
										<ul class="list-unstyled">
											<li  class="list-group-item list-group-item-action"> @lang('trips.driver_total_income') : {{ $trip->order_price + $trip->delivery_price }} </li>
											<li  class="list-group-item list-group-item-action"> @lang('trips.trip_code') : {{ $trip->code }} </li>
											<li  class="list-group-item list-group-item-action"> @lang('trips.added_by') : {{ optional($trip->admin)->name }} </li>
											<li  class="list-group-item list-group-item-action"> @lang('trips.created_at') : {{ $trip->created_at->toDayDateTimeString() }} </li>
										</ul>
										@lang('trips.settings') :
										<a target="_blank"  data-popup="tooltip" title="@lang('trips.trip_details')" href="{{ route('trips.show',['trip' => $trip->id ] ) }}" class="btn btn-outline bg-primary border-primary text-primary-800 btn-icon">
											<i class="icon-eye2 text-primary-800"></i>
										</a>

										<a target="_blank"  data-popup="tooltip" title="@lang('trips.edit')" href="{{ route('trips.edit' , ['trip' => $trip->id ] ) }}" class="btn alpha-warning border-warning text-warning-800 btn-icon ml-2">
											<i class="icon-pencil7 text-warning-800"></i>
										</a>
										<a href="" data-id="{{ $trip->id }}" data-popup="tooltip" title="@lang('trips.delete_trip')" class=" delete_item btn btn-outline bg-danger border-danger text-danger-800 btn-icon border-2 ml-2"><i class="icon-trash"></i> 
										</a>

									</div>
								</td>
							</tr>


							@endforeach

						</tbody>
					</table>

					<div class="card-footer bg-light ">
						<div class="float-right" >
							{{ $trips->links() }}
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
						title: "@lang('trips.delete_success')",
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
						text: "هل انت متاكد من حذف هذه الرحله ؟",
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