<div class="form-group">
    <label for="{!! $id !!}">{!! $label !!}</label>
    <input
    	class="{!! $block ? " form-control-plaintext" : "form-control" !!}"
    	type="{!! $type !!}"
    	id="{!! $id !!}"
    	name="{!! $name !!}"
    	rows="3"
        value="{!! isset($value) ? $value : '' !!}"
    	{!! $block ? " readonly" : "" !!}
    	>
</div>
