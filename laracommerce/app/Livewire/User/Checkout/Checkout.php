<?php

namespace App\Livewire\User\Checkout;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use App\Models\Order_item;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class Checkout extends Component
{

    public $totalPrice=0 , $payment_type=null , $payment_id=null   ;
    public $name , $phone , $email , $pincode , $address ;


    // #[On('PaymentSuccess')]
    // public function onPaymentSuccess()
    // {
    //     $this->payment_type = '1' ;
    //     $this->payment_id = '565' ;
    //     $hh=$this->placeOrder();

    //     if($hh)
    //     {
    //         Cart::where('user_id',Auth::user()->id)->delete();
    //     }
    // }



    public function payOnline()
    {
        $this->validate();

        $cartProducts = Cart::where('user_id',Auth::user()->id)->get();
        $total = 0 ;

        foreach ($cartProducts as $pro)
        {
            $total += $pro->product->selling_price * $pro->quantity;
        }


        $provider = new PayPalClient([]);
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);
        $order = $provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" =>[
                [
                "amount" => [
                    "currency_code" => "EUR",
                    "value" => $total,
                    ]
                ]
            ],
            "application_context" =>[
                "cancel_url" => route('user.payment.cancel'),
                "return_url" => route('user.payment.success',[
                        'name' =>$this->name,
                        'phone' => $this->phone,
                        'pincode' =>$this->pincode,
                        'email'=>$this->email,
                        'payment_type' => '1',
                        'address' =>$this->address,
                    ]),
            ]
            ]);

            if($order['status'] == 'CREATED')
            {
                return redirect($order['links'][1]['href']);
            }
    }


    public function rules()
    {
        return [
            'name' => 'required|string|max:225|min:5',
            'phone' => 'required|numeric|min:11',
            'email' => 'required|email|string',
            'pincode' => 'required|numeric|min:4',
            'address' => 'required|string|max:500'
        ];
    }



    public function placeOrder()
    {
        $this->validate();
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'tracking_no'=> Str::random(10),
            'payment_id'=> $this->payment_id,
            'status_message'=>'in progress',
            'name' =>$this->name,
            'phone' => $this->phone,
            'pincode' =>$this->pincode,
            'email'=>$this->email,
            'payment_type' =>$this->payment_type,
            'address' =>$this->address,

        ]);
        $cartProducts = Cart::where('user_id',Auth::user()->id)->get();
        foreach ($cartProducts as $item) {
                Order_item::create([
                        'order_id'      =>$order->id,
                        'product_id'    =>$item->product_id,
                        'quantity'      =>$item->quantity,
                        'price'         =>$item->product->selling_price,
            ]);

                Product::where('id', $item->product_id)->decrement('quantity', $item->quantity);
        }

        return true ;
    }


    public function CashOnDelivery()
    {

        $this->payment_type = '0';
        $hh=$this->placeOrder();

        if($hh)
        {
            Cart::where('user_id',Auth::user()->id)->delete();
            return view('user.pages.thankYou');
        }

    }



    public function render()
    {
        $cartProducts = Cart::where('user_id',Auth::user()->id)->get();
        return view('livewire.user.checkout.checkout',[
            'cartProducts' => $cartProducts,
        ]);
    }
}