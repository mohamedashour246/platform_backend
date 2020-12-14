<div id="add_new_customar_modal" class="modal fade " tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"> @lang('trips.customer_address_details') </h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>		
					<div class="modal-body">
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<label> @lang('trips.customer_name') </label>
									<input type="text"  name="customer_name" class="form-control" >
									@error('customer_name')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-6">
									<label> @lang('trips.phone1') </label>
									<input type="text" name="phone1" value="{{ old('phone1') }}" class="form-control @error('username') is-invalid @enderror " >
									@error('phone1')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<label> @lang('trips.phone2') </label>
									<input type="text" name="phone2" value="{{ old('phone2') }}" class="form-control @error('username') is-invalid @enderror " >
									@error('phone2')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-6">
									<label> @lang('trips.governorate') </label>
									<select name="governorate"  class="form-control governorate select" >
										@foreach ($governorates as $governorate)
										<option value="{{ $governorate->id }}">{{ $governorate['name_'.$lang] }}</option>
										@endforeach
									</select>
									@error('payment_method_id')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<label> @lang('trips.city') </label>
									<select name="city"  class="form-control city select" >
										@foreach ($cities as $city)
										<option value="{{ $city->id }}">{{ $city['name_'.$lang] }}</option>
										@endforeach
									</select>
									@error('payment_method_id')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-6">
									<label> @lang('trips.place_number') </label>
									<input type="text" name="place_number" value="{{ old('place_number') }}" class="form-control @error('place_number') is-invalid @enderror " >
									@error('place_number')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<label> @lang('trips.street_name') </label>
									<input type="text" name="street_name" value="{{ old('street_name') }}" class="form-control @error('username') is-invalid @enderror " >
									@error('street_name')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-6">
									<label> @lang('trips.avenue_number') </label>
									<input type="text" name="avenue_number" value="{{ old('avenue_number') }}" class="form-control @error('username') is-invalid @enderror " >
									@error('avenue_number')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<label> @lang('trips.building_types') </label>
									<select name="building_type_id" class="form-control building_types select" >
										@foreach ($building_types as $building_type)
										<option value="{{ $building_type->id }}">{{ $building_type['name_'.$lang] }}</option>
										@endforeach
									</select>
									@error('payment_method_id')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>					
								<div class="col-md-6">
									<label> @lang('trips.building_number') </label>
									<input type="text" name="building_number" value="{{ old('building_number') }}" class="form-control @error('building_number') is-invalid @enderror " >
									@error('building_number')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<label> @lang('trips.floor_number') </label>
									<input type="text" name="floor_number" value="{{ old('floor_number') }}" class="form-control @error('username') is-invalid @enderror " >
									@error('floor_number')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-6">
									<label> @lang('trips.apratment_number') </label>
									<input type="text" name="apratment_number" value="{{ old('apratment_number') }}" class="form-control @error('username') is-invalid @enderror " >
									@error('apratment_number')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<div id="map" style="width: 100%; height: 400px;"></div>
									<input type="hidden" id='lat'  name="latitude" value="29.378586" >
									<input type="hidden" id='lng'  name="longitude"  value="47.990341" >
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
						<button type="submit" name="save_customer" class="btn bg-primary">Submit form</button>
					</div>
			</div>
		</div>
	</div>