<?php

namespace App\Http\Controllers\User;

use App\Mail\SendInvoiceByMail;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Order_item;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{

    public function success(Request $request )
    {
        $provider = new PayPalClient ;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        // dd($response);
        if(isset($response['status']) && $response['status'] == 'COMPLETED')
        {
            $newOrder = Order::create([
                'user_id' => Auth::user()->id,
                'tracking_no'=> Str::random(10),
                'payment_id'=> $response['id'],
                'status_message'=>'in_progress',
                'name' =>$request['name'],
                'phone' => $request['phone'],
                'pincode' =>$request['pincode'],
                'email'=>$request['email'],
                'payment_type' =>'1',
                'address' =>$request['address'],

            ]);
            $cartProducts = Cart::where('user_id',Auth::user()->id)->get();
            foreach ($cartProducts as $item) {
                    Order_item::create([
                            'order_id'      =>$newOrder->id,
                            'product_id'    =>$item->product_id,
                            'quantity'      =>$item->quantity,
                            'price'         =>$item->product->selling_price,
                ]);

                    Product::where('id', $item->product_id)->decrement('quantity', $item->quantity);
            }
            Cart::where('user_id',Auth::user()->id)->delete();
            Mail::to($request['email'])->send(new SendInvoiceByMail($newOrder));

            return to_route('user.thank');
        }
    }
}
