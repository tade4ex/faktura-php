@extends('index')

@section('content')
    <table class="table mt-2">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Sprzedawca</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($sellers as $seller)
            <tr>
                <th scope="row">{!! $seller['id'] !!}</th>
                <td>{!! $seller['name'] !!}, {!! $seller['nip'] !!}</td>
                <td>
                    <a href="/invoice/all/{!! $seller['id'] !!}" class="btn btn-primary">Zobacz wystawione faktury</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
