@php
	$lang = session()->get('locale');
@endphp
<div class="row one_item ">
	<div class="col-md-5">
		<label> @lang('markets.city') </label>
		<select name="city_id[]"  class="form-control price" >
			<option value="{{ $city->id }}"> {{ $city['name_'.$lang] }} </option>
		</select>
	</div>
	<div class="col-md-5">
		<label> @lang('markets.delivery_price') </label>
		<input type="number" name="price[]"class="form-control price " >
	</div>
	<div class="col-md-2">
		<button class="btn btn-danger delete_item btn-sm mt-4" > @lang('markets.delete') </button>
	</div>
</div>