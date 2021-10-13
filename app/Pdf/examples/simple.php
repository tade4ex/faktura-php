<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include('../Src/InvoicePrinter.php');
$invoice = new InvoicePrinter();
  /* Header Settings */
  $invoice->setLogo("images/simple_sample.png");
  $invoice->setColor("#677a1a");
  $invoice->setType("Simple Invoice");
  $invoice->setReference("55033645");
  $invoice->setDate(date('d-m-Y',time()));
  $invoice->setDue(date('d-m-Y',strtotime('+3 months')));
  $invoice->hide_tofrom();
  /* Adding Items in table */
  $invoice->addItem("AMD Athlon X2DC-7450","2.4GHz/1GB/160GB/SMP-DVD/VB",1,false,false,false,3480);
  /* Add totals */
  $invoice->addTotal("Total",9460);
  $invoice->addTotal("Total due",9460,true);
  /* Render */
  $invoice->render('example2.pdf','I'); /* I => Display on browser, D => Force Download, F => local path save, S => return document path */
?>
