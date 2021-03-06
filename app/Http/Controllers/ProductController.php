<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use Session;
use App\Cart;
use Auth;
use Stripe\Stripe;
use Stripe\Charge;

class ProductController extends Controller
{
    public function getIndex()
    {
    	$products = Product::all();
    	return view('shop.index')->withProducts($products);
    }

    public function getAddToCart(Request $request, $id)
    {
    	$product = Product::find($id);
    	$oldCart = Session::has('cart') ? Session::get('cart'):null;
    	$cart = new Cart($oldCart);
    	$cart->add($product, $product->id);

    	$request->session()->put('cart', $cart);
    	return redirect()->route('product.index');
    }

    public function getCart()
    {
    	if (!Session::has('cart')) {
    		return view('shop.shopping-cart');
    	}
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
    	return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckOut()
    {
    	if (!Session::has('cart')) {
    		return view('shop.shopping-cart');
    	}
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
    	$total = $cart->totalPrice;
    	return view('shop.checkout')->withTotal($total);
    }

    public function postCheckOut(Request $request)
    {
        
        if (!Session::has('cart')) {
            return redirect()->route('shop.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        Stripe::setApiKey('sk_test_Y8bINbmkwgP17kudGZDsU9X6');

        $token = $request->input('stripeToken');

        try{
            $charge = Charge::create(array(
            "amount" => $cart->totalPrice * 100,
            "currency" => "usd",
            "source" => $token, // obtained with Stripe.js
            "description" => "Test Charge"
            ));
            $order = new Order();
            $order->cart = serialize();
            $order->name = Auth::user()->name;
            $order->address = $request->address;
            $order->payment_id = $charge->id;

            Auth::user()->orders()->save($order);

        }catch(\Exception $e){

            return redirect()->route('checkout')->with('error', $e->getMessage());
        }
        Session::forget('cart');
        return redirect()->route('product.index')->with('success', 'Successfully Purchased Products');
    }
}
