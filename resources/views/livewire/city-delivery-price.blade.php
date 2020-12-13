@php

$lang = session()->get('locale');
@endphp

<div class="row">
	<div class="col-md-12 mb-3">
		<div class="card">
			<div class="card-header">
				@lang('city_delivery_prices.search')
			</div>
			<div class="card-body">
				<a  href="{{ route('city_delivery_prices.create') }}" class="btn btn-primary float-right" >
					<i class="icon-plus3 "></i> @lang('city_delivery_prices.add_new_price')  </a>
				{{-- <button class="btn btn-dark float-right mr-2" data-toggle="collapse" data-target="#filters">
					<i class="icon-filter3"></i> @lang('prices.advanced_search')
				</button> --}}
				<div class="form-group">
					<div class="row">
						{{-- <div class="col-md-6">
							<input type="text" id="search" wire:model="search" placeholder="@lang('prices.search_prices') ....." class="form-control" >
						</div> --}}
						<div class="col-md-6">		
							<label> @lang('city_delivery_prices.from_city') </label>			
							<select  id="" wire:model="fromCity"  class="form-control select from" >
								<option value="all"> @lang('city_delivery_prices.all_cities') </option>
								@foreach ($cities as $city)
								<option value="{{ $city->id }}"> {{ $city['name_'.$lang] }} </option>
								@endforeach
							</select>
							{{-- {{ $fromCity }} --}}
						</div>


						<div class="col-md-6" >
							<label> @lang('city_delivery_prices.to_city') </label>
							<select  id="" wire:model="toCity"   class="form-control select to" >
								<option value="all"> @lang('city_delivery_prices.all_cities') </option>
								@foreach ($cities as $city)
								<option value="{{ $city->id }}"> {{ $city['name_'.$lang] }} </option>
								@endforeach
							</select>
							{{-- {{ $toCity }} --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="card" >
			<div class="card-header  header-elements-inline">
				<h5 class="card-title"> <i class="icon-users4 mr-1"></i> @lang('city_delivery_prices.city_delivery_prices')</h5>
				<div class="header-elements">
					<div class="wmin-200">
						<select class="form-control form-control-select2 select" wire:model="paginate" >
							<option value="2">2</option>
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
				<thead class="bg-dark">
					<tr>
						<th>#</th>
						<th> @lang('city_delivery_prices.from_city') </th>
						<th> @lang('city_delivery_prices.to_city') </th>
						<th> @lang('city_delivery_prices.delivery_price') </th>
						<th> @lang('city_delivery_prices.settings') </th>
					</tr>
				</thead>
				<tbody>
					@php
					$i =1 ;
					@endphp
					@foreach ($prices as $price)
					<tr>
						<td  >{{ $i++ }}</td>
						<td> {{ optional($price->from)['name_'.$lang] }} </td>
						<td> {{ optional($price->to)['name_'.$lang] }} </td>
						<td> {{ $price->price }} </td>
						<td>
							<a target="_blank"  data-popup="tooltip" title="@lang('city_delivery_prices.edit')" href="{{ route('city_delivery_prices.edit' , ['city_delivery_price' => $price->id ] ) }}" class="btn alpha-warning border-warning text-warning-800 btn-icon ml-2">
								<i class="icon-pencil7 text-warning-800"></i></a>

								<form action="{{ route('city_delivery_prices.destroy'  , ['city_delivery_price' => $price->id] ) }}" class="form-inline float-right" method="POST" >
									@csrf
									@method('DELETE')
									<button  data-popup="tooltip" title="@lang('city_delivery_prices.delete_price')" type="submit" class="btn btn-outline bg-danger border-danger text-danger-800 btn-icon border-2 "><i class="icon-trash"></i></button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="card-footer bg-dark ">
					<div class="float-right" >
						{{ $prices->links() }}
					</div>				
				</div>
			</div>
		</div>
	</div>	