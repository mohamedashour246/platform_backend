<div>
	<div class="card">
		<div class="card-header bg-dark header-elements-inline">
			<h5 class="card-title"> @lang('drivers.driver_reports') </h5>
			<div class="header-elements">
				<div class="list-icons">
					<a class="list-icons-item" data-action="collapse"></a>
					<a class="list-icons-item" data-action="reload"></a>
					<a class="list-icons-item" data-action="remove"></a>
				</div>
			</div>
		</div>
		<form action="{{ route('drivers.store') }}" method="POST"  enctype="multipart/form-data" >
			<div class="card-body">
				@csrf
				<div class="form-group">
					<div class="row">
						<div class="col-md-4">
							<label > @lang('drivers.working_start_time') </label>
							<div class="input-group ">
								<span class="input-group-prepend">
									<span class="input-group-text"><i class="icon-alarm"></i></span>
								</span>
								<input type="date" wire:model="dateFrom" class="form-control pickadate">
							</div>						
						</div>
						<div class="col-md-4">
							<label > @lang('drivers.working_end_time') </label>
							<div class="input-group ">
								<span class="input-group-prepend">
									<span class="input-group-text"><i class="icon-alarm"></i></span>
								</span>
								<input type="date" wire:model="dateTo" class="form-control pickadate1" >
							</div>
						</div>
						<div class="col-md-4">
							<label>@lang('trips.choose_drivers') </label>
							<select  wire:model="driver" class="form-control drivers">
							</select>
							{{ $driver }}
						</div>
					</div>
				</div>
			</div>

			<div class="card-footer bg-light" >
				<button type="submit" class="btn btn-primary float-right ml-2"> @lang('drivers.add') </button>
				<a href="{{ route('drivers.index') }}" class="btn btn-secondary "> @lang('drivers.back') </a>
			</div>
		</form>
	</div>
</div>

