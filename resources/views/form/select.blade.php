<div class="form-group">
    @if(isset($block) && $block)
        <label for="{!! $id !!}">{!! $label !!}</label>
        <input
            class="{!! $block ? " form-control-plaintext" : "form-control" !!}"
            type="text"
            id="{!! $id !!}"
            name="{!! $name !!}"
            rows="3"
            value="{!! isset($value) ? $options[$value] : '' !!}"
            {!! $block ? " readonly" : "" !!}
        >
    @else
        @php
            $value = isset($value) ? $value : '';
        @endphp
        <label for="{!! $id !!}">{!! $label !!}</label>
        <select class="form-control" id="{!! $id !!}"
                name="{!! $name !!}"{!! isset($block) && $block ? " readonly" : "" !!}>
            @foreach ($options as $key => $text)
                <option value="{!! $key !!}"{!! $key == $value ? 'selected' : '' !!}>{!! $text !!}</option>
            @endforeach
        </select>
    @endif
</div>
