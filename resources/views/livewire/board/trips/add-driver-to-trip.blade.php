<div>
	<div id="drivers_modal" class="modal fade"  wire:ignore.self tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"> @lang('trips.choose_driver_to_trip') </h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<input type="hidden" wire:model="trip" >
							<div class="col-sm-12">
								<label> @lang('trips.driver') </label>
								<select  id="driver" wire:model="driver" class="form-control select">
									<option value=""></option>
									@foreach ($drivers as $driver)
									<option value="{{ $driver->id }}"> {{ $driver->name }} ({{ $driver->code }}) </option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal"> @lang('trips.back') </button>
					<button  class="btn bg-primary"  wire:click="assignDriverToTrip" > @lang('trips.confirm') </button>
				</div>
			</div>
		</div>
	</div>
</div>
