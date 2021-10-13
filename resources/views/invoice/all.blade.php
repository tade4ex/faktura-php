@extends('index')

@section('content')
    @if(count($invoices) == 0)
        <div class="alert alert-danger mt-2" role="alert">
            Brak wystawionych faktur
        </div>
    @else
        <table class="table mt-2">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Data wystawienia</th>
                <th scope="col">Numer faktury</th>
                <th scope="col">Sprzedawca</th>
                <th scope="col">Nabywca</th>
                <th scope="col">Wartość brutto [PLN]</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($invoices as $key => $invoice)
                <tr>
                    <th scope="row">{!! $key + 1 !!}</th>
                    <td>{!! $invoice['invoice_date'] !!}</td>
                    <td>{!! $invoice['invoice_number'] !!}</td>
                    <td>{!! $seller['name'] !!}, {!! $seller['nip'] !!}</td>
                    <td>{!! $invoice['seller_to_name'] !!}, {!! $invoice['seller_to_nip'] !!}</td>
                    <td>{!! $invoice['item_price_sum_brutto'] !!}</td>
                    <td>
                        <a href="/invoice/view/{!! $invoice['id'] !!}" class="btn btn-primary">Zobacz</a>
                        <a href="/invoice/print/{!! $invoice['id'] !!}" class="btn btn-primary" target="_blank">Pobierz
                            PDF</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
