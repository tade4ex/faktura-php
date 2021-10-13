@extends('invoice.form', [
    'pathName' => '/invoice/add',
    'buttonName' => 'Dodaj',
    'invoice' => new \App\Invoice(),
    'editable' => true
])
