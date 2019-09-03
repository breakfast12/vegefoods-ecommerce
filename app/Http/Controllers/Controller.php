<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Payment;
use App\Address;
use Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index() {
    	$product = Product::all();

    	return view('index', ['product' => $product]);
    }

    public function show($id) {
    	$product = Product::findOrFail($id);

    	return view('product', ['product' => $product]);
    }

    public function cart() {
        $items = Cart::content();
    	return view('cart', compact('items'));
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        Cart::add(array('id' => $id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price, 'options' => ['image' => $product->image]));
        return redirect('cart')->with('success', 'Item was added in your cart!');
        
    }

    public function update(Request $request, $id)
    {

        Cart::update($id, ['qty' =>$request->qty]);

        return redirect()->back()->with('success', 'Cart Updated');
    }

    public function destroy($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }

    public function getLogin() {
        return view('userlogin');
    }

    public function postLogin(Request $request) {
        $login = $request->only('username', 'password');

        if (Auth::attempt($login)) {
            return redirect()->route('account');
        }

        return redirect()->back();
    }

    public function userLogout() {
        \Auth::logout();

        return redirect()->route('account');
    }

    public function getCheckout() {
        $items = Cart::content();
        return view('checkout', compact('items'));
    }

    public function postCheckout(Request $request) {
        
        $request->validate([
            'name' => 'required',
            'cc_number' => 'required|min:16',
            'cvv' => 'required|max:3',
            'exp_date' => 'required',
            'type' => 'required'


        ]);

        $payment = new Payment;
        $payment->id_user = auth()->user()->id_user;
        $payment->name = $request->name;
        $payment->cc_number = $request->cc_number;
        $payment->cvv = $request->cvv;
        $payment->exp_date = $request->exp_date;
        $payment->type = $request->input('type');

        $payment->save();

        return redirect('address');
        

    }

    public function getAddress() {
        $payment = Payment::all();
        return view('shipping_details', compact('payment'));
    }

    public function postAddress(Request $request, $id) {

        if (Cart::count() > 0) {
            
       $address = new Address;
       $address->id_payment = $request->id_payment;
       $address->id_user = auth()->user()->id_user;
       $address->address = $request->address;
       $address->country = $request->country;
       $address->city = $request->city;
       $address->postcode = $request->postcode;
       $address->province = $request->province;

       $address->save();

       Cart::destroy();
        }

       return redirect('/');

    }

    

} 
