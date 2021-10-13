<div class="row mt-2">
    <div class="col-12">
        <ul class="nav nav-tabs">
            @foreach ($navigation as $tab)
                <li class="nav-item">
                    <a
                        class="nav-link{!! Request::is($tab['page']) ? ' active' : '' !!}"
                        href="{!! $tab['href'] !!}">{!! $tab['title'] !!}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
