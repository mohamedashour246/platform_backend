

<div class="row">
	<div class="col-md-12 mb-3">
		<div class="card">
			<div class="card-header">
				@lang('markets.search')
			</div>
			<div class="card-body">
				<a  href="{{ route('markets.create') }}" class="btn btn-primary float-right" > <i class="icon-plus3 "></i> @lang('markets.add_new_market')  </a>
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
			<div class="card-header  header-elements-inline">
				<h5 class="card-title"> <i class="icon-users4 mr-1"></i> @lang('markets.markets')</h5>
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

			<table class="table datatable-responsive table-bordered  text-center   table-hover ">
				<thead>
					<tr>
						<th>

						</th>
						<th>#</th>
						<th> @lang('markets.logo') </th>
						<th> @lang('markets.market_name') </th>
						<th> @lang('markets.market_owner') </th>
						<th> @lang('markets.address') </th>
						<th> @lang('markets.phones') </th>
						<th> @lang('markets.activation') </th>
		
					</tr>
				</thead>
				<tbody>
					@php
					$i =1 ;
					@endphp
					@foreach ($markets as $market)
					<tr>
						<td>
							<a href="#collapse-icon{{ $market->id }}" class="text-default" data-toggle="collapse">
								<i class="icon-circle-down2"></i>
							</a>
						</td>
						<td  >{{ $i++ }}</td>
						<td > <img class="img-thumbnail" width="50" height="50" src="{{ Storage::disk('s3')->url('markets/'.$market->logo) }}" alt=""> </td>
						<td> <a href="{{ route('markets.show'  , ['market' => $market->id] ) }}">  {{ $market->name }} </a> </td>
						<td> {{ optional($market->marketAdmin)->name }} </td>
						<td> {{ $market->address }} </td>
						<td> {{ $market->phones }} </td>
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

					</tr>


					<tr class="collapse " id="collapse-icon{{ $market->id }}" >
						<td colspan="100%" >


							<div class="float-left">
								@lang('admins.settings') :

							<a target="_blank" href="{{ route('markets.show'  , ['market' => $market->id ] ) }}" class="btn btn-outline bg-primary border-primary text-primary-800 btn-icon">
								<i class="icon-eye2 text-primary-800"></i>
							</a>
							<a target="_blank" href="{{ route('markets.edit' , ['market' => $market->id ] ) }}" class="btn alpha-warning border-warning text-warning-800 btn-icon ml-2">
								<i class="icon-pencil7 text-warning-800"></i>
							</a>
							<a href="" data-id="{{ $market->id }}" class=" delete_item btn btn-outline bg-danger border-danger text-danger-800 btn-icon border-2 ml-2"><i class="icon-trash"></i>  </a>
							</div>
						</td>
					</tr>

					@endforeach

				</tbody>
			</table>


			<div class="card-footer bg-light ">
				<div class="float-right" >
					{{ $markets->links() }}
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
				title: "@lang('markets.deleted_success')", 
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
				text: "هل انت متاكد من حذف هذه المتجر ؟",
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