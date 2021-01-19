

<div class="row">
	<div class="col-md-12 mb-3">
		<div class="card">
			<div class="card-header">
				@lang('drivers.search')
			</div>
			<div class="card-body">
				<a  href="{{ route('drivers.create') }}" class="btn btn-primary float-right" > <i class="icon-user-plus "></i> @lang('drivers.add_new_driver')  </a>
				{{-- <button class="btn btn-dark float-right mr-2" data-toggle="collapse" data-target="#filters">
					<i class="icon-filter3"></i> @lang('drivers.advanced_search')
				</button> --}}
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

		<div class="card">
			<select class="form-control form-control-select2 select" wire:model="paginate" >
				<option value="2">2 </option>
				<option value="15">15 </option>
				<option value="30">30</option>
				<option value="50">50</option>
				<option value="70">70</option>
				<option value="100">100</option>
				<option value="150">150</option>
			</select>

			<select class="form-control form-control-select2 select" wire:model="sort" >
				<option value="">  ترتيب نتائج العرض حسب </option>
				<option value="SortByStartTimeASC">  وقت بدياه العمل (تصاعدى) </option>
				<option value="SortByStartTimeDESC">  وقت بدياه العمل (تنازى) </option>
				<option value="SortByEndTimeASC">  وقت انتهاء العمل (تصاعدى) </option>
				<option value="SortByEndTimeDESC">  وقت انتهاء العمل (تنازى) </option>
				<option value="available"> المتاح للعمل </option>
			</select>
		</div>
		<div class="card" >
			<table class="table datatable-responsive  text-center table-bordered  table-hover ">
				<thead>
					<tr>
						<th></th>
						<th>#</th>
						<th> @lang('drivers.picture') </th>
						<th> @lang('drivers.added_by') </th>
						<th> @lang('drivers.driver_name') </th>
						<th> @lang('drivers.phone') </th>
						<th> @lang('drivers.car_number') </th>
						<th> @lang('drivers.availability') </th>
						<th> @lang('drivers.trips_count') </th>
						<th> @lang('drivers.bills_count') </th>		
						<th> @lang('drivers.working_start_time') </th>
						<th> @lang('drivers.working_end_time') </th>
						<th> @lang('drivers.code') </th>
						{{-- <th> @lang('drivers.settings') </th> --}}
					</tr>
				</thead>
				<tbody>
					@php
					$i =1 ;
					@endphp
					@foreach ($drivers as $driver)
					<tr>
						<td>
							<a href="#collapse-icon{{ $driver->id }}" class="text-default" data-toggle="collapse">
								<i class="icon-circle-down2"></i>
							</a>
						</td>
						<td>{{ $i++ }}</td>
						<td> <img class="img-thumbnail" width="50" height="50" src="{{ Storage::disk('s3')->url('drivers/'.$driver->image) }}" alt=""> </td>
						<td> <a href="{{ route('admins.show'  , ['admin' => $driver->admin_id ] ) }}"> {{ optional($driver->admin)->name }} </a> </td>
						<td> <a href="{{ route('drivers.show'  , ['driver' => $driver->id] ) }}">  {{ $driver->name }} </a> </td>

						<td> {{ $driver->phone }} </td>
						<td> {{ $driver->car_number }} </td>
						<td>
							<div class="form-check form-check-switchery">
								<label class="form-check-label">
									<input type="checkbox" name="status" data-status="{{ $driver->available }}" data-driver-id="{{ $driver->id }}" class="form-check-input-switchery" {{ $driver->isAvailable() ? 'checked' : '' }} data-fouc>
								</label>
							</div>
						</td>
						<td>0</td>
						<td>0</td>
						<td> {{ \Carbon\Carbon::parse($driver->working_start_time)->format('H:i:s A') }} </td>
						<td> {{ \Carbon\Carbon::parse($driver->working_end_time)->format('H:i:s A')   }} </td>
						<td> {{ $driver->code }} </td>						
					</tr>

					<tr  class="collapse " id="collapse-icon{{ $driver->id }}" >
						<td  colspan="100%"  >
							<div class="float-left">
								<a target="_blank" href="{{ route('drivers.show'  , ['driver' => $driver->id ] ) }}" class="btn btn-outline bg-primary border-primary text-primary-800 btn-icon">
									<i class="icon-eye2 text-primary-800"></i>
								</a>
								<a target="_blank" href="{{ route('drivers.edit' , ['driver' => $driver->id ] ) }}" class="btn alpha-warning border-warning text-warning-800 btn-icon ml-2">
									<i class="icon-pencil7 text-warning-800"></i>
								</a>
								<a href="" data-id="{{ $driver->id }}" class=" delete_item btn btn-outline bg-danger border-danger text-danger-800 btn-icon border-2 ml-2"><i class="icon-trash"></i>  </a>
							</div>
						</td>
						
					</tr>

					@endforeach

				</tbody>
			</table>


			<div class="card-footer bg-light ">
				<div class="float-right" >
					{{ $drivers->links() }}
				</div>				
			</div>
		</div>



	</div>
</div>	


<script src="{{ asset('board_assets/global_assets/js/demo_pages/content_cards_header.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/demo_pages/content_cards_header.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/forms/styling/switch.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>




	$(document).ready(function() {





			var status ;
			var elems = Array.prototype.slice.call(document.querySelectorAll('.form-check-input-switchery'));
			elems.forEach(function(html) {
				var switchery = new Switchery(html , { color: 'green'  , secondaryColor    : 'red' });
			});


			$('input[name="status"]').change(  function(event) {
				event.preventDefault();
				driver_id = $(this).attr('data-driver-id');
				currentStatus = $(this).attr('data-status');
				if (currentStatus == 1) {
					status =  0;
				} else {
					status =   1;
				}

			console.log(driver_id , currentStatus , status);
				$.ajax({
					url: '{{ url("Board/drivers/change_status") }}',
					type: 'POST',
					dataType: 'json',
					data: {driver_id:driver_id  , _token:"{{ csrf_token() }}" , status:status },
				})
				.done(function() {
					console.log("success");
				});

				return false;

			});

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
				title: "@lang('drivers.deleted_success')", 
			});
		})




		$('a.delete_item').on('click',  function(event) {
			event.preventDefault();
			item_id = $(this).data('id');
			confirm_deletion(item_id);
		});

		function confirm_deletion(item_id) {

			Swal.fire({
				title: 'تاكيد الحذف ',
				text: "هل انت متاكد من حذف هذا السائق ؟",
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