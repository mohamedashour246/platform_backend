<div class="row">
	
	<div class="col-md-12">

		<!-- Search field -->
		<div class="">
			<div class="">
				
				
				
			</div>
		</div>
		<!-- /search field -->

		<!-- Basic responsive configuration -->
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">@lang('admins.admins') </h5>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
						<a class="list-icons-item" data-action="reload"></a>
						<a class="list-icons-item" data-action="remove"></a>
					</div>
				</div>
			</div>

			<div class="card-body">
				<div class="input-group mb-3">
					<div class="form-group-feedback form-group-feedback-left">
						<input type="text"  wire:model="search" class="form-control form-control-lg text-center" placeholder="@lang('admins.search_admins')">
						<div class="form-control-feedback form-control-feedback-lg">
							<i class="icon-search4 text-muted"></i>
						</div>
					</div>
				</div>
			</div>

			<table class="table datatable-responsive">
				<thead>
					<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Job Title</th>
					</tr>
				</thead>
				<tbody>
					
					@foreach ($admins as $admin)
					<tr>
						<td>{{ $admin->username }}</td>
						<td>{{ $admin->email }}</td>
						<td>{{ $admin->type }}</td>
					</tr>

					@endforeach

				</tbody>
			</table>
		</div>
		<!-- /basic responsive configuration -->
		{{ $admins->links() }}
	</div>
</div>	