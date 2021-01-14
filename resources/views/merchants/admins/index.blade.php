@php
$lang = session()->get('locale');
@endphp
@extends('merchants.layout.master')
@section('title')
@lang('profile.profile')
@endsection


@section('header')
<div class="page-header">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('admins.admins') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<a href="{{ route('merchants.board') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('merchants.merchants') </a>
				<a href="{{ route('merchants.admins.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('admins.admins') </a>
				<span class="breadcrumb-item active"> @lang('admins.show_all_admins') </span>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		@include('merchants.layout.messages')

		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12 mb-3">
					<a  href="{{ route('merchants.admins.create') }}" class="btn btn-primary float-right" > <i class="icon-user-plus mr-1"></i>@lang('admins.add_new_admin') </a>
				</div>
			</div>
			<div class="card" >



				<table class="table datatable-responsive  table-bordered text-center   table-hover ">
					<thead class="bg-dark">
						<tr>

							<th> </th>
							<th> @lang('admins.admin_number')  </th>
							<th> @lang('admins.picture') </th>
							<th> @lang('admins.name') </th>
							<th> @lang('admins.username') </th>
							<th> @lang('admins.admin_type') </th>
							<th> @lang('admins.status') </th>
							<th> @lang('admins.governorate') </th>
							<th> @lang('admins.trips_count') </th>
							<th> @lang('admins.created_at') </th>
						</tr>
					</thead>
					<tbody>
						@php
						$i =1 ;
						@endphp
						@foreach ($admins as $admin)
						<tr>
							<td> <a href="#collapse-icon{{ $admin->id }}" class="text-default" data-toggle="collapse">
								<i class="icon-circle-down2"></i>
							</a>
						</td>
						<td>
							{{ $admin->id }}
						</td>
						<td> <img class="img-thumbnail" width="50" height="50" src="{{ Storage::disk('s3')->url('merchants/'.$admin->image) }}" alt=""> </td>
						<td  > <a href="{{ route('merchants.admins.show', ['admin' => $admin->id])}}"> {{ $admin->name }} </a> </td>
						<td  > {{ $admin->username }} </td>
						<td> {{ optional($admin->type)['name_'.$lang] }} </td>
						<td>
							<div class="form-check form-check-switchery">
								<label class="form-check-label">
									<input type="checkbox" name="status" data-admin_id="{{ $admin->id }}" class="form-check-input-switchery" {{ $admin->isActive() ? 'checked' : '' }} data-fouc>
								</label>
							</div>
						</td>
						<td> {{ optional($admin->governorate)['name_'.$lang] }} </td>

						<td> {{ $admin->trips()->whereDay('created_at'  , Carbon\Carbon::today() )->count() }} </td>
						<td>{{ $admin->created_at->toFormattedDateString() }} - <span class="text-muted"> {{ $admin->created_at->diffForHumans() }} </span> </td>

					</tr>

					<tr class="collapse " id="collapse-icon{{ $admin->id }}" >
						<td colspan="100%" >


							<div class="float-left">
								@lang('admins.settings') :

								<a target="_blank" href="{{ route('merchants.admins.show'  , ['admin' => $admin->id ] ) }}"
									class="btn btn-outline bg-primary border-primary text-primary-800 btn-icon">
									<i class="icon-eye2 "></i>
								</a>
								<a target="_blank" href="{{ route('merchants.admins.edit' , ['admin' => $admin->id ] ) }}"
									class="btn btn-outline bg-warning border-warning text-warning-800 btn-icon ml-2">
									<i class="icon-pencil7 "></i>
								</a>
								<a href="" data-id="{{ $admin->id }}" class=" delete_branch btn btn-outline bg-danger border-danger text-danger-800 btn-icon border-2 ml-2"><i class="icon-trash "></i>  </a>


								<a target="_blank" href="{{ url('Merchant/admins/'.$admin->id.'/trips') }}"
									class="btn btn-outline bg-info border-info text-info-800 btn-icon ml-2">
									<i class="icon-car2 "></i>
								</a>

								<form name="deleteFormNumber{{ $admin->id }}" action="{{ route('merchants.admins.destroy' , ['admin' => $admin->id ]) }}" method="POST" >

									@method('DELETE')
									@csrf
								</form>
							</div>
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
</div>

@endsection


@section('styles')


@endsection

@section('scripts')
<script src="{{ asset('board_assets/global_assets/js/demo_pages/content_cards_header.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/forms/styling/switch.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
	$(function() {


		var elems = Array.prototype.slice.call(document.querySelectorAll('.form-check-input-switchery'));
		elems.forEach(function(html) {
			var switchery = new Switchery(html , { color: 'green'  , secondaryColor    : 'red' });
		});


		$('input[name="status"]').change(  function(event) {
			event.preventDefault();
			admin_id = $(this).attr('data-admin_id');
			console.log(admin_id);
			$.ajax({
				url: '{{ url("Merchant/admins/change_status") }}',
				type: 'POST',
				dataType: 'json',
				data: {admin_id:admin_id  , _token:"{{ csrf_token() }}" },
			})
			.done(function() {
				console.log("success");
			});

			return false;

		});

		$('a.delete_branch').on('click', function(event) {
			event.preventDefault();
			id = $(this).data('id');
			console.log(id);
			Swal.fire({

				text: "هل انت متاكد من رغبتك فى حذف الفرع",
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'نعم',
				cancelButtonText: 'لا'
			}).then((result) => {
				if (result.isConfirmed) {

					name = "deleteFormNumber" + id;
					$('form[name="'+ name +'"]').submit();

				}
			})
		});
	});
</script>

@endsection