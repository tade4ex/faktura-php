<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\Seller;
use App\Pdf\Src\InvoicePrinter;

class InvoiceController extends Controller
{
    public function add()
    {
        $_sellers = Seller::select('id', 'name', 'name2', 'nip')->get();
        $sellers = [];
        foreach ($_sellers as $seller) {
            $sellers[$seller['id']] = $seller['name'] . ' ' . $seller['name2'] . ', ' . $seller['nip'];
        }
        return view('invoice/add', ["sellers" => $sellers]);
    }

    public function view($id)
    {
        $_sellers = Seller::select('id', 'name', 'nip')->get();
        $sellers = [];
        foreach ($_sellers as $seller) {
            $sellers[$seller['id']] = $seller['name'] . ', ' . $seller['nip'];
        }
        $invoice = Invoice::where('id', $id)->first();
        return view('invoice/view', ["sellers" => $sellers, "invoice" => $invoice]);
    }

    public function edit($id)
    {
        $_sellers = Seller::select('id', 'name', 'name2', 'nip')->get();
        $sellers = [];
        foreach ($_sellers as $seller) {
            $sellers[$seller['id']] = $seller['name'] . ' ' . $seller['name2'] . ', ' . $seller['nip'];
        }
        $invoice = Invoice::where('id', $id)->first();
        return view('invoice/edit', ["sellers" => $sellers, "invoice" => $invoice]);
    }

    public function allSellers()
    {
        $sellers = Seller::all();
        return view('seller/all', ['sellers' => $sellers]);
    }

    public function allInvoices($id)
    {
        $seller = Seller::where('id', $id)->first();
        $invoices = Invoice::where('seller_id', $id)->orderBy('invoice_date', 'DESC')->orderBy('id', 'DESC')->get();
        return view('invoice/all', ['seller' => $seller, 'invoices' => $invoices]);
    }

    public function printView($id)
    {
        $invoice = Invoice::where('id', $id)->first();
        $seller = Seller::where('id', $invoice->seller_id)->first();
        $invoicePrint = new InvoicePrinter();
        try {
            $invoicePrint->setLogo(public_path() . "/images/logo-" . $invoice->seller_id . ".jpg");
        } catch (\Exception $e) {
        }
        $invoicePrint->setColor("#007fff");
        if ($invoice->item_vat == 0) {
            $invoicePrint->setType("Faktura VAT marża");
            $invoicePrint->vatField = true;
            $invoicePrint->recalculateColumns();
        } else {
            $invoicePrint->setType("Faktura VAT");
            $invoicePrint->vatField = true;
            $invoicePrint->recalculateColumns();
        }
        $invoicePrint->setReference($invoice->invoice_number);
        $invoicePrint->setDate($invoice->invoice_date);
        if ($invoice->pay_type == 1) {
            $invoicePrint->setDue($invoice->pay_date);
        }
        $invoicePrint->setFrom(
            array(
                $seller->name,
                $seller->name2,
                $seller->address,
                $seller->zipcode . ' ' . $seller->city,
                'NIP: ' . $seller->nip,
                'REGON: ' . $seller->regon,
                'NR BDO: ' . $seller->bro,
            )
        );
        $invoicePrint->setTo(
            array(
                $invoice->seller_to_name,
                "",
                $invoice->seller_to_address,
                $invoice->seller_to_zipcode . ' ' . $invoice->seller_to_city,
                'NIP: ' . ($invoice->seller_to_type == 1 ? $invoice->seller_to_nip : "-"),
                $invoice->seller_to_type == 2 ? "PESEL: " . $invoice->seller_to_nip : "",
                "",
            )
        );
        $invoicePrint->addItem(
            $invoice->item_description,
            $invoice->item_count,
            $invoice->item_price,
            $invoice->item_vat . '%',
            $invoice->item_price_vat,
            $invoice->item_price_sum_netto,
            $invoice->item_price_sum_brutto);
        $invoicePrint->addTotal("RAZEM:", $invoice->item_price_sum_brutto, true);


        $invoicePrint->addTitle("Razem do zapłaty: " . $invoicePrint->getTotal($invoice->item_price_sum));
        try {
            $priceWord = $invoicePrint->d2w($invoice->item_price_sum_brutto);
            $invoicePrint->addParagraph('Słownie: ' . $priceWord);
        } catch (\Exception $e) {
        }
        $invoicePrint->addParagraph('Sposób zapłaty: ' . ($invoice->pay_type == 0 ? 'gotówka' : 'przelew'));
        $invoicePrint->addParagraph("Numer rachunku: 94 0000 1111 0000 2222 0000 6622 B.S. Jarocin");
        $invoicePrint->addParagraph("Kupujący zrzeka się rękojmi i gwarancji. Stan techniczny kupującemu jest znany.");
        $invoicePrint->addParagraph("Wyrażam zgodę na przetwarzanie danych osobowych zgodnie z obowiązującą ustawą od 25-05-2018r.");
        $invoicePrint->addParagraph("");
        $invoicePrint->addParagraph("");
        $invoicePrint->addParagraph("");
        $invoicePrint->addParagraph("");
        $invoicePrint->addParagraph("");
        $invoicePrint->setFooternote($seller->name . ' ' . $seller->name2);
//        $invoicePrint->addBadge("Invoice Copy");
        $invoicePrint->render($invoice->invoice_number . '.pdf', 'I');

        /* I => Display on browser, D => Force Download, F => local path save, S => return document path */
    }

    public function ajaxAdd(Request $request)
    {
        $valid = $request->validate(Invoice::$rules);
        if (isset($valid->errors)) {
            return response()->json($valid->errors(), 400);
        }
        $invoice = Invoice::create($valid);
        return response()->json(["id" => $invoice->id], 201);
    }

    public function ajaxEdit(Request $request, $id)
    {

        $valid = $request->validate(Invoice::$rules);
        Invoice::where('id', $id)->update($valid);
        return response()->json(["id" => $id], 201);
    }

    public function delete($id)
    {
        Invoice::where('id', $id)->delete();
        return view('invoice/delete', []);
    }
}
