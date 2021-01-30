@php
$lang = session()->get('locale');
@endphp

<div class="row">

	<div class="col-md-12">

		<div class="card-body bg-transparent">
			<ul class="list-inline mb-0 float-right">

				<li class="list-inline-item">
					<a  data-toggle="collapse" href="#advanced_search_div" class="btn btn-success float-right" >
						<i class="icon-filter4 "></i> @lang('trips.advanced_search')
					</a>
				</li>
				<li class="list-inline-item">
					<a  href="{{ route('trips.create') }}" class="btn btn-primary float-right" >
						<i class="icon-plus3 "></i> @lang('trips.add_new_trip')
					</a>
				</li>
			</ul>
		</div>

	</div>
	<br>

	<div class="col-md-12">
		<div class="card collapse" id="advanced_search_div" wire:ignore>
			<div class="card-header bg-dark">
				@lang('trips.advanced_search')
			</div>
			<div class="card-body">
				<div class="form-group">
					<div class="row">
						<div class="col-md-2">
							<label> @lang('trips.trip_period') </label>
							<select wire:model="trip_period" class="form-control trip_period" >
								<option value="trips_of_today" selected="selected"> @lang('trips.trips_of_today') </option>
								<option value="future_trips"> @lang('trips.future_trips') </option>
								<option value="all"> @lang('trips.all_trips') </option>
								<option value="a_certain_period"> @lang('trips.a_certain_period') </option>							
							</select>
						</div>
						<div class="col-md-2">
							<label> @lang('trips.payment_method') </label>
							<select wire:model="payment_method" class="form-control " >
								<option value="all"> @lang('trips.all_payment_methods') </option>
								@foreach ($payment_methods as $payment_method)
								<option value="{{ $payment_method->id }}"> {{ $payment_method['name_'.$lang] }} </option>
								@endforeach
							</select>
						</div>
						<div class="col-md-2">
							<label> @lang('trips.payment_status') </label>
							<select wire:model="payment_status" class="form-control " >
								<option value="all"> @lang('trips.all') </option>
								<option value="1"> @lang('trips.paid')  </option>
								<option value="0"> @lang('trips.unpaid') </option>
							</select>
						</div>
						<div class="col-md-2">
							<label> @lang('trips.status') </label>
							<select wire:model="status" class="form-control " >
								<option value="all"> @lang('trips.all_status') </option>
								@foreach ($trips_statuses as $status)
								<option value="{{ $status->id }}"> {{ $status['name_'.$lang]  }} </option>
								@endforeach
							</select>
						</div>
						<div class="col-md-2">
							<label> @lang('trips.from_delivery_date') </label>
							<input type="date"  wire:model="from_delivery_date" class="form-control  ">

						</div>
						<div class="col-md-2">
							<label> @lang('trips.to_delivery_date') </label>
							<input type="date"  wire:model="to_delivery_date"  class="form-control  ">

						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">

				<a wire:click="generatePDF" class="btn btn-primary text-white float-right ml-1" >
					<i class="icon-file-pdf"></i> @lang('trips.pdf')
				</a>
				<a  wire:click="generateExcel" class="btn btn-primary text-white float-right" >
					<i class="icon-file-excel"></i> @lang('trips.excel')
				</a>
			</div>
		</div>
	</div>


	<hr>
	<div class="col-md-12">
		<div class="card" >
			<div class="card-header  header-elements-inline">
				<h5 class="card-title"> <i class="icon-users4 mr-1"></i>    عرض  <span class="badge bg-primary" > {{ $trips->count() }} </span>   من اجمالى  <span class="badge bg-primary" > {{ $trips->total() }} </span> </h5>
				<div class="header-elements">

					<div class="row">
						<div class="form-group mb-0">
							<div class="form-group-feedback form-group-feedback-right">
								<input type="search" class="form-control"  id="search" wire:model="search" placeholder="@lang('trips.search_trips') ....."  >
								<div class="form-control-feedback">
									<i class="icon-search4 font-size-base text-muted"></i>
								</div>
							</div>
						</div>

						<div class="form-group ml-1">
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
			</div>

			@if (count($trips))
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
							<a href="#" data-toggle="modal" wire:click="$emitTo('board.trips.add-driver-to-trip', 'userAboutToChooseDriver',{{ $trip->id }})" data-target="#drivers_modal"  class="btn btn-outline bg-grey border-grey text-grey-600 btn-icon rounded-round border-2"><i class="icon-plus2"></i></a>
							@else
							{{ optional($trip->driver)->name }} 
						</td>

						@endif
						<td>
							<span class="badge" style="background-color: {{ optional($trip->status)->color }};color: white" > {{ optional($trip->status)['name_'.$lang] }} </span>
						</td>
						<td> <span class="badge badge-info"> {{ optional($trip->payment_method)['name_'.$lang] }} </span>  </td>
						<td>
							{{-- @switch($trip->paid)
							@case(1)
							<span class="badge bg-success"> @lang('trips.payment_completed') </span>
							@break
							@case(0)
							<span class="badge bg-danger"> @lang('trips.payment_completed') </span>
							@break
							@endswitch --}}

							<select class="form-control select"  >
								<option value="1" {{ $trip->payment_status == 1 ? 'selected="selected"' : '' }} > @lang('trips.paid')  </option>
								<option value="0" {{ $trip->payment_status == 0 ? 'selected="selected"' : '' }} > @lang('trips.unpaid') </option>
							</select>
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
									@if ($trip->payment_status == 0)
									<li  class="list-group-item list-group-item-action"> @lang('trips.generate_payment_link') :  
										<a href="" onclick="MyWindow=window.open('https://deliverina.cbk.com/merchant/Admin/Login','MyWindow','width=1000,height=500'); return false;" >  <i class="icon-unlink2 " ></i> @lang('trips.click_here') </a>  
									</li>
									@endif
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
			@else
			<p class="text-center text-muted font-bold " > لا يوجد رحلات للرض </p>
			@endif

			<div class="card-footer bg-light ">
				<div class="float-right" >
					{{ $trips->links() }}
				</div>
			</div>
		</div>
	</div>
	<livewire:board.trips.add-driver-to-trip  />
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
		});


		Livewire.on('driverAddedToTrip', itemId => {
			$('#drivers_modal').modal('hide');
			Toast.fire({
				icon: 'success',
				title: "@lang('trips.driver_added_to_tip')",
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