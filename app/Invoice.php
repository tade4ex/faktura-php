<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public static $rules = [
        'seller_id' => 'required|int',
        'invoice_number' => 'required|string|min:1|max:255',
        'invoice_date' => 'required|date_format:d-m-Y',
        'seller_to_type' => 'required|int|min:1|max:10',
        'seller_to_name' => 'required|string|min:1|max:255',
        'seller_to_nip' => 'required|string|max:255',
        'seller_to_address' => 'required|string|min:1|max:255',
        'seller_to_zipcode' => 'required|string|min:1|max:255',
        'seller_to_city' => 'required|string|min:1|max:255',
        'item_description' => 'required|string|min:1|max:1000',
        'item_count' => 'required|int|min:1',
        'item_price' => 'required|numeric|min:0.01',
        'item_vat' => 'required|int',
        'item_price_vat' => 'required|numeric',
        'item_price_sum_netto' => 'required|numeric|min:0.01',
        'item_price_sum_brutto' => 'required|numeric|min:0.01',
        'pay_type' => 'required|int',
        'pay_date' => 'required|date_format:d-m-Y'
    ];

    protected $fillable = [
        'seller_id', 'invoice_number', 'invoice_date', 'seller_to_name', 'seller_to_type', 'seller_to_nip', 'seller_to_address', 'seller_to_zipcode', 'seller_to_city', 'item_description', 'item_count', 'item_price', 'item_vat', 'item_price_vat', 'item_price_sum_netto', 'item_price_sum_brutto', 'pay_type', 'pay_date'
    ];
}
