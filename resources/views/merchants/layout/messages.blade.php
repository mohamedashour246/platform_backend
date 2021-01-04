@if (session('success_msg'))
<div class="alert alert-primary alert-styled-left alert-dismissible">
	<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
	{{ session('success_msg') }}
</div>
@endif

@if (session('error_msg'))
<div class="alert alert-danger alert-styled-left alert-dismissible">
	<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
	{{ session('error_msg') }}
</div>
@endif

@if (session('warning_msg'))
<div class="alert alert-danger alert-styled-left alert-dismissible">
	<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
	{{ session('warning_msg') }}
</div>
@endif




{{-- 
<div class="alert alert-danger alert-styled-left alert-dismissible">
	<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
	<span class="font-weight-semibold">Oh snap!</span> Change a few things up and <a href="#" class="alert-link">try submitting again</a>.
</div>
<div class="alert alert-warning alert-styled-left alert-dismissible">
	<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
	<span class="font-weight-semibold">Warning!</span> Better <a href="#" class="alert-link">check yourself</a>, you're not looking too good.
</div>
 --}}