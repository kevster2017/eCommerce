<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Models\Payment;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;


class PaypalController extends Controller
{
    private $gateway;

    public function __construct()
    {

        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientID(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function pay(Request $request)
    {

        $user_id = auth()->user()->id;

        $fullCart = Cart::where('user_id', $user_id)
            ->get();

        foreach ($fullCart as $cart) {
            $order = Order::where('user_id', $user_id)->get();


            $order->user_id = $cart->user_id;
            $order->status = "Pending";

            $order->payment_status = "Paid";
            //  $order->save();


        }


        try {
            $response = $this->gateway->purchase(array(
                'amount' => $request->amount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success'),
                'cancelUrl' => url('error'),

            ))->send();



            if ($response->isRedirect()) {
                $response->redirect();
            } else {
                return $response->getMessage();
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function success(Request $request)
    {

        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));

            $response = $transaction->send();

            // dd($response);

            if ($response->isSuccessful()) {
                $arr = $response->getData();

                $payment = new Payment();
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];

                $payment->save();

                $user_id = auth()->user()->id;

                Cart::where('user_id', $user_id)->delete();


                return redirect('/orders/myOrders')->with('success', "Payment Successful. Transaction Id is: " . $arr['id']);
            } else {
                return $response->getMessage();
            }
        } else {

            return back()->with('error', "Payment Declined!!");
            //return "Payment Declined!!";
        }
    }

    public function error()
    {
        return "User declined payment";
    }
}
