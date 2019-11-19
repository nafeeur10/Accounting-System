<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Contact;
use App\InvoiceNumber;
use App\Product;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    
    public function index()
    {
        $users = Contact::all();
        return view('invoice.index', compact('users'));
    }

    public function createInvoice(Request $request)
    {
        $count = DB::table('invoice_numbers')->count();

        if($count==0)
        {
            $Id = 1; 
        }
        else
        {
            $invoiceCreate = InvoiceNumber::latest()->first();
            $lastYear = $invoiceCreate['yearOfInvoice'];
            $todayYear = date('Y');

            if(($lastYear+1)==$todayYear)
            {
                $Id = 1;
            }
            else
            {
                $Id = $invoiceCreate['invoice_id'] + 1;
            }
        }

        $invoiceNumber = new InvoiceNumber();
        $invoiceNumber->invoice_id = $Id;
        $invoiceNumber->yearOfInvoice = date('Y');

        $invoiceNumber->save();
    }

   
    public function create(Contact $user)
    {
        // Generate an Invoice Number
        $invoiceCreate = InvoiceNumber::latest()->first();
        
        $year = $invoiceCreate['yearOfInvoice'];
        $idOfI = $invoiceCreate['invoice_id'];
        
        $invoice = 'T'.$year.str_pad( $idOfI, 3, '0', STR_PAD_LEFT );
        DB::table('main_invoice')->insertOrIgnore([
            ['invoiceNumber' => $invoice]
        ]);


        // Get last Generated Invoice Number



        $products = Product::all();
        $client = Auth::user();

        return view('invoice.create', compact('user', 'client', 'invoice', 'products'));
    }

    

    public function select($id)
    {
        $productindividual = Product::findOrFail($id);
        return $productindividual;
    }

    public function save(Request $request)
    {
        $size = count(collect($request)->get('itemCost'));
        $invoioceNo = DB::table('main_invoice')
                      ->select('invoiceNumber')
                      ->orderBy('id', 'DESC')
                      ->first();
        //var_dump ($invoioceNo);
         //return ($size);

        for($i=0; $i<$size; $i++)
        {
            $invoice = new Invoice();

            $invoice->invoiceNumber = $invoioceNo->invoiceNumber;
            $invoice->invoice_date = $request->invoiceDate;
            $invoice->invoice_due_date = $request->invoiceDueDate;
            $invoice->userID = $request->userID;

            $productID = $request['product_id'][$i];

            if(!(is_numeric($productID)))
            {
                $newProduct = new Product();
                $newProduct->productName = $productID;
                $newProduct->productDescription = $request['itemDescription'][$i];
                $newProduct->productUnitCost = $request['itemCost'][$i];

                $newProduct->save();  
                
                $LatestProduct = Product::latest()->first();
                $productID = $LatestProduct->id;
            }

            
           
            $product = Product::findOrFail($productID);
            $productName = $product->productName;


            $invoice->productName = $productName;
            $invoice->productDescription = $product->productDescription;
            $invoice->productUnitPrice = $request['itemCost'][$i];
            $invoice->productQuantity = $request['itemQuantity'][$i];
            $invoice->rowProductPrice = ($request['itemCost'][$i])*($request['itemQuantity'][$i]);

            //dd($invoice);
            $invoice->save();
        }

        return redirect()->route('final-invoice');
    }

    public function read()
    {
        $invoiceLatest = Invoice::latest()->first();
        //dd($invoice);
        return view('invoice.create', compact('invoiceLatest'));
    }

    public function invoice(Contact $user)
    {
        $invoiceLatest = Invoice::latest()->first();
        $lastInvoiceNumber = $invoiceLatest->invoiceNumber;

        $invoiceProducts = Invoice::where('invoiceNumber', $lastInvoiceNumber)->get();
        $realID = $invoiceProducts->toArray();
        $userID = $realID[0]['userID'];

        $userMain = Contact::find($userID);

        // $userMain = $invoiceProducts->userID;

        $products = Product::all();
        $client = Auth::user();

        return view('invoice.invoice', compact('userMain', 'client', 'products', 'invoiceProducts'));
    }

    public function downloadPDF($id) 
    {
        $client = Auth::user();

        $invoiceLatest = Invoice::latest()->first();
        $lastInvoiceNumber = $invoiceLatest->invoiceNumber;
        $invoiceProducts = Invoice::where('invoiceNumber', $lastInvoiceNumber)->get();
        
        $userMain = Contact::find($id);

        //return view('invoice.pdf', compact('client', 'invoiceProducts', 'userMain'));
        $pdf = PDF::loadView('invoice.pdf', compact('client', 'invoiceProducts', 'userMain'));
        return $pdf->download('invoice.pdf');
    }
}
