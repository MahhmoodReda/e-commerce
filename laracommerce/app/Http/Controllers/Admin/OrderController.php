<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon as SupportCarbon;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index(Request $request)
    {
        $orders =Order::when($request->date != null ,function($q) use ($request){
            return $q->whereDate('created_at',$request->date);
        }
        )
        ->get();
        if($orders)
        {
            return view('admin.pages.Orders.index',compact('orders'));
        }else{
            $orders = Order::all();
            return view('admin.pages.Orders.index',compact('orders'));
        }
    }


    public function showOrder($id)
    {
        $order = Order::where('id',$id)->first();
        if($order)
        {
            return view('admin.pages.Orders.order-show',compact('order'));
        }else{
            return redirect()->back()->with('error' , 'no order found');
        }
    }


    public function updateStatus($id , Request $request)
    {
        // dd($request);
        $order=Order::where('id',$id)->first();
        if($order)
        {
            $order->update([
                'status_message' => $request->status,
            ]);
            return to_route('admin.show-order',$id)->with('success','order updated successfully');
        }else{
            return to_route('admin.show-order',$id)->with('error','order not found');
        }
    }


    public function viewInvoice($id)
    {
        $invoice = Order::findOrFail($id);
        return view('admin.pages.Invoice.invoice',compact('invoice'));
    }


    public function downloadInvoice($id)
    {
        $invoice = Order::findOrFail($id);
        $data = ['invoice' => $invoice];
        $today = Carbon::now()->format('d-m-Y');
        $pdf = Pdf::loadView('admin.pages.Invoice.invoice', $data);
        return $pdf->download('invoice-'.$invoice->tracking_no.'_'.$today.'.pdf');
    }


}
