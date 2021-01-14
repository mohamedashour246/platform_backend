@php
$lang = session()->get('locale');
@endphp
<div>
	<div class="row">
		<div class="col-md-12">
			@include('merchants.layout.messages')
			<div class="row">
				<div class="col-md-12 mb-3">
					<a  href="{{ route('merchants.customers.create') }}" class="btn btn-primary float-right ml-1" > <i class="icon-plus3  mr-1"></i>@lang('customers.add_new_customer') </a>

					<a  data-toggle="collapse" href="#search_by_trip_code_div" class="btn btn-success float-right" >
						<i class="icon-search4  "></i> @lang('customers.search')
					</a>
				</div>
			</div>
			<div class="card collapse" id="search_by_trip_code_div" wire:ignore>
				<div class="card-body">
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<input type="text" id="search" wire:model="search" placeholder="@lang('customers.search') ....." class="form-control" >
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="card" >
				<div class="card-header bg-transparent header-elements-inline">

					<div class="header-elements float-left">
						<div class="wmin-200 float-left">
							<select class="form-control form-control-select2 select float-left" wire:model="paginate" >
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
				<table class="table datatable-responsive table-togglable table-bordered text-center  table-hover ">
					<thead class="bg-dark">
						<tr>
							<th>#</th>
							<th> @lang('customers.customer_name') </th>
							<th> @lang('customers.business_type') </th>
							<th> @lang('customers.phone1') </th>
							<th> @lang('customers.phone2') </th>
							<th> @lang('customers.address') </th>
							<th> @lang('customers.created_at') </th>
						</tr>
					</thead>
					<tbody>
						@php
						$i =1 ;
						@endphp
						@foreach ($customers as $customer)
						<tr>
							<td>
								<a href="#collapse-icon{{ $customer->id }}" class="text-default" data-toggle="collapse">
									<i class="icon-circle-down2"></i>
								</a>
							</td>
							<td  > <a href="{{ route('merchants.customers.show', ['customer' => $customer->id])}}"> {{ $customer->name }} </a> </td>
							<td >{{ $customer->business_type }}</td>
							<td >{{ $customer->phone1 }}</td>
							<td >{{ $customer->phone2 }}</td>
							<td >
								@lang('customers.governorate') {{ optional($customer->governorate)['name_'.$lang] }}
								@lang('customers.city') {{ optional($city->governorate)['name_'.$lang] }}
								@lang('customers.place_number') {{ $customer->place_number }}
								@lang('customers.street_name') {{ $customer->street_name }}
								@lang('customers.avenue_number') {{$customer->avenue_number }}
								@lang('customers.building_number') {{$customer->building_number }}
								@lang('customers.building_type') {{ optional($customer->building_type)['name_'] }}
							</td>
							<td> {{ $customer->created_at->toDayDateTimeString() }} </td>

						</tr>
						<tr class="collapse " id="collapse-icon{{ $customer->id }}" >
							<td colspan="100%" >
								<div class="float-left">
									<a target="_blank" href="{{ route('merchants.customers.show'  , ['customer' => $customer->id ] ) }}" class="btn btn-outline bg-primary border-primary text-primary-800 btn-icon">
										<i class="icon-eye2 text-primary-800"></i>
									</a>
									<a target="_blank" href="{{ route('merchants.customers.edit' , ['customer' => $customer->id ] ) }}" class="btn alpha-warning border-warning text-warning-800 btn-icon ml-2">
										<i class="icon-pencil7 text-warning-800"></i>
									</a>

									<a href="" data-id="{{ $customer->id }}" data-popup="tooltip" title="@lang('customers.delete_customer')" class=" delete_item btn btn-outline bg-danger border-danger text-danger-800 btn-icon border-2 ml-2"><i class="icon-trash"></i>  </a>

								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>

			<div class="card-footer">
				{{ $customers->links() }}
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
				text: "هل انت متاكد من حذف هذا العميل ؟",
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
