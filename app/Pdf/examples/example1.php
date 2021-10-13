<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include('../Src/InvoicePrinter.php');
$invoice = new InvoicePrinter();
  /* Header Settings */
  // $invoice->setLogo("images/sample1.jpg");
  $invoice->setColor("#007fff");
  $invoice->setType("Faktura");
  $invoice->setReference("INV-55033645");
  $invoice->setDate(date('d-m-Y',time()));
  $invoice->setDue(date('d-m-Y', strtotime('+10 months')));
  $invoice->setFrom(
    array(
      "Firma kszak 1",
      "NIP: 725-18-01-126",
      "Adres:",
      "ul. Galileliusza 8",
      "62-120 Poznańśćąćź"
    )
  );
  $invoice->setTo(
    array(
      "Firma kszak 2",
      "NIP: 725-18-01-126",
      "Adres:",
      "ul. Galileliusza 8",
      "62-120 Poznań"
    )
  );
  /* Adding Items in table */
  $invoice->addItem(
    "AMD Athlon X2DC-7450",
    "2.4GHz/1GB/160GB/SMP-DVD/VB",
    1, "szt", 14500, 14500);
  /* Add totals */
  $invoice->addTotal("RAZEM:", 11446.6, true);
  /* Set badge */ 
  // $invoice->addBadge("Payment Paid");
  /* Add title */
  // $invoice->addTitle("Important Notice");
  /* Add Paragraph */
  $invoice->addParagraph("Numer rachunku: 94 0000 1111 0000 2222 0000 6622 B.S. Jarocin");
  $invoice->addParagraph("Kupujący zrzeka się rejkojmi i gwarancji. Stan techniczny kupującemu jest znany.");
  $invoice->addParagraph("Wyrażam zgodę na przetwarzanie danych osobowych zgodnie z obowiązującą ustawą od 25-05-2018r.");
  /* Set footer note */
  /* Render */
  $invoice->render('example1.pdf','I'); /* I => Display on browser, D => Force Download, F => local path save, S => return document path */
?>
