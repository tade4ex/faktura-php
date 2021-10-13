@extends('invoice.form', [
    'pathName' => '/invoice/edit/' . $invoice->id,
    'buttonName' => 'Zapisz',
    'invoice' => $invoice,
    'editable' => true
])
