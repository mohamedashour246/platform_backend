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
				<div class="card-header  header-elements-inline">
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

				<table class="table datatable-responsive  text-center  table-bordered table-hover ">
						<thead>
							<tr>
								<th></th>
								<th>#</th>
								<th> @lang('cities.name_ar') </th>
								<th> @lang('cities.name_en') </th>
								<th> @lang('cities.governorate') </th>
								<th> @lang('cities.added_by') </th>
								<th> @lang('cities.activation') </th>
								<th> @lang('cities.address_count') </th>
								<th> @lang('cities.created_at') </th>
						
							</tr>
						</thead>
						<tbody>
							@php
							$i =1 ;
							@endphp
							@foreach ($cities as $city)
							<tr>
								<td> 
		 <a href="#collapse-icon{{ $city->id }}" class="text-default" data-toggle="collapse">
 	<i class="icon-circle-down2"></i>
 </a>

								</td>	
								<td  >{{ $i++ }}</td>
								<td> {{ $city->name_ar }} </td>
								<td> {{ $city->name_en }} </td>


								<td> {{ optional($city->governorate)['name_'.$lang] }} </td>

								<td>
									<a target="_blank" href="{{ route('admins.show'  , ['admin' => $city->admin_id] ) }}"> {{ optional($city->admin)->username }} </a>
								</td>
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
								<td>
									{{ $city->created_at->toFormattedDateString() }} - <span class="text-muted"> {{ $city->created_at->diffForHumans() }} </span> 
								</td>
								<td>
									
									{{ $city->addresses_count }}

								</td>
							</tr>


							<tr class="collapse " id="collapse-icon{{ $city->id }}" >
								
								<td colspan="100%"  >
									<div class="float-left" >
										<a target="_blank" href="{{ route('cities.show',['city' => $city->id ] ) }}" class="btn btn-outline bg-primary border-primary text-primary-800 btn-icon">
										<i class="icon-eye2 text-primary-800"></i>
									</a>
									<a target="_blank" href="{{ route('cities.edit' , ['city' => $city->id ] ) }}" class="btn alpha-warning border-warning text-warning-800 btn-icon ml-2">
										<i class="icon-pencil7 text-warning-800"></i>
									</a>

									<a href="" data-id="{{ $city->id }}" class=" delete_item btn btn-outline bg-danger border-danger text-danger-800 btn-icon border-2 ml-2"><i class="icon-trash"></i>  </a>
									</div>
								</td>
							</tr>

							@endforeach

						</tbody>
					</table>


				<div class="card-footer bg-light ">
					<div class="float-right" >
						{{ $cities->links() }}
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
					title: "@lang('cities.deleted_success')", 
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
					text: "هل انت متاكد من حذف هذه المدينه ؟",
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