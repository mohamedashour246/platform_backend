@php
$lang = session()->get('locale');
@endphp
@extends('board.layout.master')
@section('title')
@lang('markets.market_details')
@endsection


@section('header')
<div class="page-header ">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('markets.markets') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<a href="{{ route('board.index') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>
				<a href="{{ route('markets.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('markets.markets') </a>
				<span class="breadcrumb-item active"> @lang('markets.market_details') </span>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')

<div class="row">

	<div class="col-md-12 mb-3">
		<div class="header-elements ">
			<div class="float-right">
				<a href="{{ route('markets.create') }}" class="btn btn-primary ml-1"> <i class="icon-user-plus"></i> @lang('markets.add_new_market')  </a>
				<a href="{{ route('markets.edit'  , ['market' => $market->id ] ) }}" class="btn btn-warning ml-1"> <i class="icon-pencil5"></i> @lang('markets.edit_market_details')  </a>
				<form action="{{ route('markets.destroy'  , ['market' => $market->id] ) }}" method="POST" class="float-right ml-1">
					@csrf
					@method('DELETE')
					<button class="btn btn-danger "> <i class="icon-trash"></i> @lang('markets.delete_market') </button>
				</form>
			</div>
		</div>
	</div>


	@include('board.layout.messages')

	<div class="col-md-2">
		<div class="card">
			<div class="card-body text-center">
				<div class="card-img-actions d-inline-block mb-3">
					<img class="img-thumbnail img-responsive " src="{{ Storage::disk('s3')->url('markets/'.$market->logo) }}" alt="" width="170" height="170">
				</div>
				<h6 class="font-weight-semibold mb-0">{{ $market->name }}</h6>
			</div>
		</div>
		

		<div class="card">
			<div class="list-group list-group-flush ">
				<a href="{{ route('markets.show'  , ['market' => $market->id] ) }}" class="list-group-item list-group-item-action  text-dark ">
					<i class="icon-store mr-3"></i>
					@lang('markets.market_details')
				</a>
				<a href="{{ route('market.admin'  , ['market' => $market->id ] ) }}" class="list-group-item list-group-item-action text-dark ">
					<i class="icon-user mr-3"></i>
					@lang('markets.market_admin')
				</a>
				<a href="{{ route('market.branches'  , ['market' => $market->id ] ) }}" class="list-group-item list-group-item-action text-dark">
					<i class="icon-git-branch  mr-3"></i>
					@lang('markets.branches')
				</a>
				<a href="{{ route('market.documents'  , ['market' => $market->id ] ) }}" class="list-group-item list-group-item-action text-dark">
					<i class="icon-files-empty  mr-3"></i>
					@lang('markets.documents')
				</a>
				<a href="{{ route('market.trips'  , ['market' => $market->id ] ) }}" class="list-group-item list-group-item-action text-dark">
					<i class="icon-location3  mr-3"></i>
					@lang('markets.trips')
				</a>
				<a href="{{ route('market.bank_accounts'  , ['market' => $market->id ] ) }}" class="list-group-item list-group-item-action text-dark">
					<i class="icon-coin-dollar  mr-3"></i>
					@lang('markets.bank_accounts')
				</a>
				<a href="{{ route('market.emails'  , ['market' => $market->id ] ) }}" class="list-group-item list-group-item-action text-dark">
					<i class="icon-mail-read  mr-3"></i>
					@lang('markets.emails')
				</a>
				<a href="{{ route('market.delivery_prices'  , ['market' => $market->id ] ) }}" class="list-group-item list-group-item-action text-white active">
					<i class="icon-coin-dollar  mr-3"></i>
					@lang('markets.delivery_prices')
				</a>
			</div>
		</div>
	</div>
	<div class="col-md-10">
		<!-- Account settings -->

		<div class="row">
			<div class="col-md-12">
				<div class="header-elements  ">
					<div class="float-right">
						<a href="{{ route('market.delivery_prices.create', ['market' => $market->id ] ) }}" class="btn btn-primary ml-1"> <i class="icon-plus3"></i>  @lang('markets.add_market_delivery_prices') </a>
					</div>
				</div>
			</div>
			<hr>
			<br>

		</div>


		<div class="card ">

			<table class="table  table-xs table-bordered">
				<thead class="bg-dark">
					<tr>
						<th> # </th>
						<th> @lang('markets.from_city') </th>
						<th> @lang('markets.to_city') </th>
						<th> @lang('markets.delivery_price') </th>
						<th> @lang('markets.added_by') </th>
						<th> @lang('markets.created_at') </th>
						<th> @lang('markets.settings') </th>
					</tr>
				</thead>
				<tbody>
					@php
					$i = 1;
					@endphp
					@foreach ($market->delivery_prices as $delivery_price)
					<tr>
						<td> {{ $i++ }} </td>
						<td> {{ optional($delivery_price->from)['name_'.$lang] }}  </td>
						<td> {{ optional($delivery_price->to)['name_'.$lang] }}  </td>
						<td> {{ $delivery_price->price }} </td>
						<td> {{ optional($delivery_price->admin)->name }} </td>
						<td> <span data-popup="tooltip" title="{{ $delivery_price->created_at->diffForHumans() }}" >  {{ $delivery_price->created_at->toFormattedDateString() }} </span> </td>
						<td> 
							<a target="_blank" href="{{ route('city_delivery_prices.edit' , ['city_delivery_price' => $delivery_price->id ] ) }}" class="btn alpha-warning border-warning text-warning-800 btn-icon ml-2">
								<i class="icon-pencil7 text-warning-800"></i>
							</a>
							<a href="" data-id="{{ $delivery_price->id }}" class=" delete_item btn btn-outline bg-danger border-danger text-danger-800 btn-icon border-2 ml-2"><i class="icon-trash"></i>  </a>
						</td>
					</tr>
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
			text: "هل انت متاكد من حذف مدينه التوصيل ؟",
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'نعم',
			cancelButtonText: 'لا',
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: '{{ url('Board/ajax/delete_delivery_price') }}',
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