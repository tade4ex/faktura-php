@include('header')

<div class="container-fluid">
    @include('nav', [
        'navigation' => [
            [
                "page" => "invoice/add",
                "href" => "/invoice/add",
                "title" => "Wystaw fakturę"
            ],
            [
                "page" => "invoice/all",
                "href" => "/invoice/all",
                "title" => "Wystawione faktury"
            ]
        ]
    ])
    @yield('content')
</div>

@include('footer')
