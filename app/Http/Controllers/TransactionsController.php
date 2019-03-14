<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Event;
use App\Transaction;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use Auth;
use Stripe\Charge;
use Stripe\Stripe;


class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Event::all();
        return view('student.order', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderController  $transactionsController
     * @return \Illuminate\Http\Response
     */
    public function show(OrderController $transactionsController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderController  $transactionsController
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderController $transactionsController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderController  $transactionsController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderController $transactionsController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderController  $transactionsController
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderController $transactionsController)
    {
        //
    }

    public function getAddToCart(Request $request, $id)
    {
        $product = Event::findOrFail($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('transactions.index');
    }

    public function getReduceByOne($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('transactions.ordering-cart');
    }

    public function getRemoveItem($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->route('transactions.ordering-cart');
    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('student.ordering-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('student.ordering-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout()
    {
        if (!Session::has('cart')) {
            return view('student.ordering-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('student.checkout', ['total' => $total]);
    }

    public function postCheckout(Request $request)
    {
        if (!Session::has('cart')) {
            return redirect()->route('transactions.ordering-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        Stripe::setApiKey('sk_test_fwmVPdJfpkmwlQRedXec5IxR');
        try {
            $charge = Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtained with Stripe.js
                "description" => "Test Charge"
            ));
            $transaction = new Transaction();
            $transaction->cart = serialize($cart);
            // $transaction->address = $request->input('address');
            // $transaction->name = $request->input('name');
            // $transaction->payment_id = $charge->id;

            Auth::user()->orders()->save($transaction);
        } catch (\Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }

        Session::forget('cart');
        return redirect()->route('transaction.order')->with('success', 'Successfully purchased products!');
    }


}
