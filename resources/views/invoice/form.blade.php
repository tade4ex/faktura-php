@extends('index')

@section('content')
    <div class="row mt-2 mb-4 justify-content-md-center">
        <div class="col-11">
            @if(!$editable)
                <div class="row">
                    <div class="col-12">
                        <a href="/invoice/edit/{!! $invoice->id !!}" class="btn btn-primary">Edytuj</a>
                        <a href="/invoice/print/{!! $invoice->id !!}" class="btn btn-info">Pobierz PDF</a>
                        <a href="/invoice/delete/{!! $invoice->id !!}" class="btn btn-danger">Usuń</a>
                    </div>
                </div>
                <hr>
            @endif
            <form name="formSend">
                <div class="row">
                    <div class="col-12">
                        @include('form/select', [
                            'id' => 'seller_id',
                            'name' => 'seller_id',
                            'label' => 'Dostawca',
                            'options' => $sellers,
                            'value' => $invoice->seller_id,
                            'block' => !$editable
                        ])
                    </div>
                    <div class="col-4">
                        @include('form/input', [
                            'id' => 'invoice_number',
                            'name' => 'invoice_number',
                            'label' => 'Numer faktury',
                            'type' => 'text',
                            'block' => !$editable,
                            'value' => $invoice->invoice_number
                        ])
                    </div>
                    <div class="col-4">
                        @include('form/datepicker', [
                            'id' => 'invoice_date',
                            'name' => 'invoice_date',
                            'label' => 'Data wystawienia faktury',
                            'block' => !$editable,
                            'value' => $invoice->invoice_date
                        ])
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-4">
                        @include('form/select', [
                            'id' => 'seller_to_type',
                            'name' => 'seller_to_type',
                            'label' => 'Typ nabywcy',
                            'options' => [
                                1 => 'firma',
                                2 => 'osoba fizyczna'
                            ],
                            'value' => $invoice->seller_to_type,
                            'block' => !$editable
                        ])
                    </div>
                    <div class="col-8">
                        @include('form/input', [
                            'id' => 'seller_to_name',
                            'name' => 'seller_to_name',
                            'label' => 'Nazwa nabywcy',
                            'type' => 'text',
                            'block' => !$editable,
                            'value' => $invoice->seller_to_name
                        ])
                    </div>
                    <div class="col-4">
                        @include('form/input', [
                            'id' => 'seller_to_nip',
                            'name' => 'seller_to_nip',
                            'label' => 'Nip nabywcy',
                            'type' => 'text',
                            'block' => !$editable,
                            'value' => $invoice->seller_to_nip
                        ])
                    </div>
                    <div class="col-8">
                        @include('form/input', [
                            'id' => 'seller_to_address',
                            'name' => 'seller_to_address',
                            'label' => 'Ulica',
                            'type' => 'text',
                            'block' => !$editable,
                            'value' => $invoice->seller_to_address
                        ])
                    </div>
                    <div class="col-4">
                        @include('form/input', [
                            'id' => 'seller_to_zipcode',
                            'name' => 'seller_to_zipcode',
                            'label' => 'Kod pocztowy nabywcy',
                            'type' => 'text',
                            'block' => !$editable,
                            'value' => $invoice->seller_to_zipcode
                        ])
                    </div>
                    <div class="col-8">
                        @include('form/input', [
                            'id' => 'seller_to_city',
                            'name' => 'seller_to_city',
                            'label' => 'Miejscowość nabywcy',
                            'type' => 'text',
                            'block' => !$editable,
                            'value' => $invoice->seller_to_city
                        ])
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        @include('form/textarea', [
                            'id' => 'item_description',
                            'name' => 'item_description',
                            'label' => 'Nazwa towaru lub usługi',
                            'block' => !$editable,
                            'value' => $invoice->item_description
                        ])
                    </div>
                    <div class="col-1">
                        @include('form/input', [
                            'id' => 'item_count',
                            'name' => 'item_count',
                            'label' => 'Ilość',
                            'type' => 'text',
                            'block' => !$editable,
                            'value' => $invoice->item_count
                        ])
                    </div>
                    <div class="col-3">
                        @include('form/input', [
                            'id' => 'item_price',
                            'name' => 'item_price',
                            'label' => 'Cena brutto [PLN]',
                            'type' => 'text',
                            'block' => !$editable,
                            'value' => $invoice->item_price
                        ])
                    </div>
                    <div class="col-2">
                        @include('form/input', [
                            'id' => 'item_price_sum_netto',
                            'name' => 'item_price_sum_netto',
                            'label' => 'Wartość netto [PLN]',
                            'type' => 'text', 'block' => true,
                            'value' => $invoice->item_price_sum_netto
                        ])
                    </div>
                    <div class="col-2">
                        @include('form/select', [
                            'id' => 'item_vat',
                            'name' => 'item_vat',
                            'label' => 'VAT',
                            'options' => [0 => "0%", 23 => "23%"],
                            'value' => $invoice->item_vat,
                            'block' => !$editable
                        ])
                    </div>
                    <div class="col-2">
                        @include('form/input', [
                            'id' => 'item_price_vat',
                            'name' => 'item_price_vat',
                            'label' => 'Wartość VAT [PLN]',
                            'type' => 'text', 'block' => true,
                            'value' => $invoice->item_price_vat
                        ])
                    </div>
                    <div class="col-2">
                        @include('form/input', [
                            'id' => 'item_price_sum_brutto',
                            'name' => 'item_price_sum_brutto',
                            'label' => 'Wartość brutto [PLN]',
                            'type' => 'text', 'block' => true,
                            'value' => $invoice->item_price_sum_brutto
                        ])
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-4">
                        @include('form/select', [
                            'id' => 'pay_type',
                            'name' => 'pay_type',
                            'label' => 'Sposób płatności',
                            'options' => [0 => "gotówka", 1 => "przelew"],
                            'value' => $invoice->pay_type,
                            'block' => !$editable
                        ])
                    </div>
                    <div class="col-4" id="pay_date_col">
                        @include('form/datepicker', [
                            'id' => 'pay_date',
                            'name' => 'pay_date',
                            'label' => 'Termin płatności',
                            'block' => false,
                            'value' => $invoice->pay_date,
                            'block' => !$editable
                        ])
                    </div>
                </div>
                @if($editable)
                    <hr>
                    <button type="submit" class="btn btn-success">{!! $buttonName !!}</button>
                @endif
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            function buyerType() {
                var type = $("#seller_to_type").val();
                if (type == 1) {
                    $('label[for=seller_to_name]').text("Nazwa nabywcy");
                    $('label[for=seller_to_nip]').text("Nip nabywcy");
                } else {
                    $('label[for=seller_to_name]').text("Imię nazwisko nabywcy");
                    $('label[for=seller_to_nip]').text("Pesel nabywcy");
                }
            }

            $("#seller_to_type").on("change", buyerType);
            buyerType();
                @if($editable)
            var d = new Date();

            if ($("#invoice_date").val() == "") {
                $("#invoice_date").val([d.getDate(), d.getMonth() + 1, d.getFullYear()].map(function (a) {
                    return a < 10 ? "0" + a : a;
                }).join("-"));
            }

            if ($("#pay_date").val() == "") {
                $("#pay_date").val([d.getDate(), d.getMonth() + 1, d.getFullYear()].map(function (a) {
                    return a < 10 ? "0" + a : a;
                }).join("-"));
            }

            $('.datepicker').datepicker({
                language: 'pl'
            });

            function viewPayType() {
                if ($("#pay_type").val() == 1) {
                    $("#pay_date_col").show();
                } else {
                    $("#pay_date_col").hide();
                }
            }

            viewPayType();

            $("#pay_type").on("change", function () {
                viewPayType();
            });

            function getPrice(name) {
                var value = $(name).val();
                if (/^([0-9]{1,}|[0-9]{1,}\.[0-9]{1,4}|[0-9]{1,}\,[0-9]{1,4})$/.test(value)) {
                    var price = parseFloat(value.replace(/\,/g, '.'));
                    return price;
                }
                return 0;
            }

            function getItemCount() {
                var count = Number($("#item_count").val());
                return isNaN(count) ? 0 : count;
            }

            function getItemPrice() {
                return getPrice("#item_price");
            }

            function getVat() {
                var vat = Number($("#item_vat").val());
                return isNaN(vat) ? 0 : vat;
            }

            function getPricesSum() {
                var priceOneBrutto = getItemPrice();
                var count = getItemCount();
                var vat = getVat();
                var priceSumBrutto = priceOneBrutto * count;
                var priceSumNetto = priceSumBrutto / (1 + vat / 100);
                var vatPrice = priceSumBrutto - priceSumNetto;
                return {
                    vat: vatPrice.toFixed(2),
                    netto: priceSumNetto.toFixed(2),
                    brutto: priceSumBrutto.toFixed(2)
                };
            }

            function setPrices() {
                var prices = getPricesSum();
                $("#item_price_sum_netto").val(prices.netto);
                $("#item_price_vat").val(prices.vat);
                $("#item_price_sum_brutto").val(prices.brutto);
            }

            $("#item_count, #item_price, #item_vat")
                .on("keyup", setPrices)
                .on("change", setPrices);

            setPrices();

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
                $.post('{!! $pathName !!}', data)
                    .done(function (payload) {
                        window.location.href = "/invoice/view/" + payload.id;
                    })
                    .fail(function (error) {
                        if (error.status === 422) {
                            viewErrors(Object.keys(error.responseJSON.errors));
                            alert("Uzupełnij wszystkie pola oznaczone czerwonym!");
                        }
                    });
                return false;
            });
            @endif
        });
    </script>
@stop
