<div class="form-group">
    <label for="{!! $id !!}">{!! $label !!}</label>
    <input class="form-control datepicker" name="{!! $name !!}" id="{!! $id !!}" data-date-format="dd-mm-yyyy" data-language="pl" value="{!! isset($value) ? $value : '' !!}"{!! $block ? " readonly" : "" !!}>
</div>
