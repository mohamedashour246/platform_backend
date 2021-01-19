@php
$lang = session()->get('locale');
@endphp
@extends('board.layout.master')
@section('title')
@lang('profile.profile')
@endsection


@section('header')
<div class="page-header">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('admin_types.admin_types') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<a href="{{ route('board.index') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>
				<a href="{{ route('admin_types.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('admin_types.admin_types') </a>
				<span class="breadcrumb-item active"> @lang('admin_types.show_all_admin_types') </span>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="header-elements  ">
			<div class="float-right">
				<a href="{{ route('admin_types.create') }}" class="btn btn-primary ml-1"> <i class="icon-plus3"></i>  @lang('admin_types.add_new_type') </a>
			</div>
		</div>
	</div>
	<hr>
	<br>
</div>


<div class="row">
	<div class="col-md-12">
		@include('board.layout.messages')

		<div class="card ">

			<table class="table  table-xs table-bordered">
				<thead class="bg-dark">
					<tr>
						<th></th>
						<th> # </th>
						<th> @lang('admin_types.name_en') </th>
						<th> @lang('admin_types.name_ar') </th>
						<th> @lang('admin_types.added_by') </th>
						<th> @lang('admin_types.created_at') </th>
					</tr>
				</thead>
				<tbody>
					@php
					$i = 1;
					@endphp
					@foreach ($types as $type)
					<tr>
						<td>
							<a href="#collapse-icon{{ $type->id }}" class="text-default" data-toggle="collapse">
								<i class="icon-circle-down2"></i>
							</a>
						</td>
						<td> {{ $i++ }} </td>
						<td>  {{ $type->name_ar }} </td>
						<td> {{ $type->name_en }} </td>
						<td> {{ optional($type->admin)->name }} </td>
						<td> <span data-popup="tooltip" title="{{ $type->created_at->diffForHumans() }}" >  {{ $type->created_at->toFormattedDateString() }} </span> </td>

					</tr>



					<tr class="collapse " id="collapse-icon{{ $type->id }}" >
						<td colspan="100%" >

							<div class="float-left">
								@lang('admin_types.settings') :
								<a target="_blank" href="{{ route('admin_types.edit' , ['admin_type' => $type->id ] ) }}" class="btn alpha-warning border-warning text-warning-800 btn-icon ml-2">
									<i class="icon-pencil7 text-warning-800"></i>
								</a>
								@if ($type->deletable)
								<a href="" data-id="{{ $type->id }}" class=" delete_item btn btn-outline bg-danger border-danger text-danger-800 btn-icon border-2 ml-2"><i class="icon-trash"></i>  </a>
							</div>
						</td>
					</tr>




					@endif
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection


@section('styles')


@endsection


@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
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
	function confirm_deletion() {
		Swal.fire({
			title: 'تاكيد الحذف ',
			text: "هل انت متاكد من حذف التصنيف ؟",
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'نعم',
			cancelButtonText: 'لا',
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: '{{ url('Board/ajax/delete_admin_type') }}',
					type: 'POST',
					dataType: 'json',
					data: {id:id , _method:"DELETE" , _token:"{{ csrf_token() }}" },
				})
				.done(function(data) {
					Toast.fire({
						icon: data.status,
						title: data.msg , 
					})
					if (data.status == 'success') {
						setTimeout(location.reload(), 1000);
					}
				});
				
			}
		})
	}

	$(function() {
		$('a.delete_item').on('click', function(event) {
			event.preventDefault();
			id = $(this).data('id');
			confirm_deletion();

		});
	});
</script>

@endsection