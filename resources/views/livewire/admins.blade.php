@php
$lang = session()->get('locale');
@endphp
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
				<a  href="{{ route('admins.create') }}" class="btn btn-primary float-right" > <i class="icon-user-plus mr-1"></i>@lang('admins.add_new_admin') </a>
			</div>
		</div>

		<div class="card" >
			<div class="card-header  header-elements-inline  bg-transparent ">
				<h5 class="card-title"></h5>
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


			<table class="table datatable-responsive table-bordered text-center   table-hover ">
				<thead class="bg-dark">
					<tr>
						<th>#</th>
						<th> @lang('admins.picture') </th>
						<th> @lang('admins.name') </th>
						<th> @lang('admins.phone') </th>
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
						<td  > <a href="{{ route('admins.show', ['admin' => $admin->id])}}"> {{ $admin->name }} </a> </td>
						<td >{{ $admin->phone }}</td>
						<td> {{ optional($admin->type)['name_'.$lang] }} </td>
						<td> <a target="_blank" href="{{ route('admins.show'  , ['admin' => $admin->admin_id] ) }}"> {{ optional($admin->addedBy)->username }} </a> </td>
						<td>
							<input type="checkbox" class="form-check-input form-check-input-switch" data-on-text="On" data-off-text="Off" {{ $admin->isActive() ? 'checked' : '' }}>

						</td>
						<td>{{ $admin->created_at->toFormattedDateString() }} - <span class="text-muted"> {{ $admin->created_at->diffForHumans() }} </span> </td>
						<td>
							<a target="_blank" href="{{ route('admins.show'  , ['admin' => $admin->id ] ) }}" class="btn btn-outline bg-primary border-primary text-primary-800 btn-icon">
								<i class="icon-eye2 text-primary-800"></i>
							</a>
							<a target="_blank" href="{{ route('admins.edit' , ['admin' => $admin->id ] ) }}" class="btn alpha-warning border-warning text-warning-800 btn-icon ml-2">
								<i class="icon-pencil7 text-warning-800"></i></a>

								<a href="" data-id="{{ $admin->id }}" class=" delete_admin btn btn-outline bg-danger border-danger text-danger-800 btn-icon border-2 ml-2"><i class="icon-trash"></i>  </a>
								{{-- <form action="{{ route('admins.destroy'  , ['admin' => $admin->id] ) }}" class="form-inline float-right" method="POST" >
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-outline bg-danger border-danger text-danger-800 btn-icon border-2 ml-2"><i class="icon-trash"></i></button>
								</form> --}}
							</td>
						</tr>

						@endforeach

					</tbody>
				</table>



				<div class="card-footer bg-light ">
					<div class="float-right" >
						{{ $admins->links() }}
					</div>				
				</div>
			</div>



		</div>
	</div>	
	<script src="{{ asset('board_assets/global_assets/js/plugins/forms/styling/switch.min.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script>


		$(document).ready(function() {
			$('.form-check-input-switch').bootstrapSwitch();
			$('a.delete_admin').on('click',  function(event) {
				event.preventDefault();
				admin_id = $(this).data('id');
				confirm_deletion(admin_id);
			});
		});

		function confirm_deletion(admin_id) {

			Swal.fire({
				title: 'تاكيد الحذف ',
				text: "هل انت متاكد من حذف هذا المشرف ؟",
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'نعم',
				cancelButtonText: 'لا',
			}).then((result) => {
				if (result.isConfirmed) {
					Livewire.emit('deleteAdminConfirmed'  , admin_id );
				}
			})
		}



	</script>