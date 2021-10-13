<div class="form-group">
    <label for="{!! $id !!}">{!! $label !!}</label>
    <textarea class="form-control" id="{!! $id !!}" name="{!! $name !!}" rows="3"{!! isset($block) && $block ? " readonly" : "" !!}>{!! isset($value) ? $value : '' !!}</textarea>
</div>
