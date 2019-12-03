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

    public function deleteInvoice()
    {
        DB::table('main_invoice')->orderBy('id', 'desc')->limit(1)->delete();
        DB::table('invoice_numbers')->orderBy('id', 'desc')->limit(1)->delete();
    }

    function toNumber($dest)
    {
        if ($dest=='1')
            return 1;
        else if($dest=='2')
            return 2;
        else if($dest=='3')
            return 3;
        else if($dest=='4')
            return 4;
        else if($dest=='5')
            return 5;
        else if($dest=='6')
            return 6;
        else if($dest=='7')
            return 7;
        else if($dest=='8')
            return 8;
        else if($dest=='9')
            return 9;
        else
            return 0;
    }
    
    public function index()
    {
        $users = Contact::all();
        return view('invoice.index', compact('users'));
    }

    public function createInvoice()
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

   
    public function create()
    {

        $this->createInvoice();

            // Generate an Invoice Number
            $invoiceCreate = InvoiceNumber::latest()->first();
            
            $year = $invoiceCreate['yearOfInvoice'];
            $idOfI = $invoiceCreate['invoice_id'];
            
            $invoice = 'T'.$year.str_pad( $idOfI, 3, '0', STR_PAD_LEFT );
            DB::table('main_invoice')->insertOrIgnore([
                ['invoiceNumber' => $invoice]
            ]);


        $products = Product::all();
        $users = Contact::all();
        $client = Auth::user();

        return view('invoice.create', compact('users', 'client', 'invoice', 'products'));
    }

    public function getCustomer($id)
    {
        $customer = Contact::findOrFail($id);
        return response()->json($customer);
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
            $authuser = Auth::id();
            $invoice->customerID = $authuser;
            $invoice->userID = $request->userID;

            //dd($request->userID);

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
