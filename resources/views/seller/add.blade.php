@extends('index')

@section('content')
    <div class="row mt-2 mb-4 justify-content-md-center">
        <div class="col-11">
            <form name="formSend">
                <div class="row">
                    <div class="col-8">
                        @include('form/input', [
                            'id' => 'name',
                            'name' => 'name',
                            'label' => 'Nazwa',
                            'type' => 'text', 'block' => false
                        ])
                    </div>
                    <div class="col-4">
                        @include('form/input', [
                            'id' => 'nip',
                            'name' => 'nip',
                            'label' => 'Nip',
                            'type' => 'text', 'block' => false
                        ])
                    </div>
                    <div class="col-8">
                        @include('form/input', [
                            'id' => 'name2',
                            'name' => 'name2',
                            'label' => 'Nazwa 2',
                            'type' => 'text', 'block' => false
                        ])
                    </div>
                    <div class="col-4">
                        @include('form/input', [
                            'id' => 'regon',
                            'name' => 'regon',
                            'label' => 'Regon',
                            'type' => 'text', 'block' => false
                        ])
                    </div>
                    <div class="col-4">
                        @include('form/input', [
                            'id' => 'address',
                            'name' => 'address',
                            'label' => 'Adres',
                            'type' => 'text', 'block' => false
                        ])
                    </div>
                    <div class="col-4">
                        @include('form/input', [
                            'id' => 'zipcode',
                            'name' => 'zipcode',
                            'label' => 'Kod pocztowy',
                            'type' => 'text', 'block' => false
                        ])
                    </div>
                    <div class="col-4">
                        @include('form/input', [
                            'id' => 'city',
                            'name' => 'city',
                            'label' => 'Miejscowość',
                            'type' => 'text', 'block' => false
                        ])
                    </div>
                    <div class="col-12">
                        @include('form/input', [
                            'id' => 'bank',
                            'name' => 'bank',
                            'label' => 'bank',
                            'type' => 'text', 'block' => false
                        ])
                    </div>
                    <div class="col-4">
                        @include('form/input', [
                            'id' => 'bro',
                            'name' => 'bro',
                            'label' => 'NR BRO',
                            'type' => 'text', 'block' => false
                        ])
                    </div>
                </div>
                <hr>
                <button type="submit" class="btn btn-primary">Dodaj</button>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function () {

            function viewErrors(names) {
                names.forEach(function (name) {
                    $('[name=' + name + ']').addClass("is-invalid");
                });
            }

            $('[name=formSend]').on("submit", function (e) {
                e.preventDefault();
                var data = {
                    _token: "{!! csrf_token() !!}",
                };
                $(this).serializeArray().forEach(function (item) {
                    data[item.name] = item.value;
                });
                $("input,textarea,select").removeClass("is-invalid");
                $.post('/seller/add', data)
                    .done(function (payload) {
                        console.log(payload);
                    })
                    .fail(function (error) {
                        if (error.status === 400) {
                            viewErrors(Object.keys(error.responseJSON));
                            alert("Uzupełnij wszystkie pola oznaczone czerwonym!");
                        }
                    });
                return false;
            })
        });
    </script>
@stop
