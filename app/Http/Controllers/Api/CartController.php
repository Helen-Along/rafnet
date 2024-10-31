<?php

namespace App\Http\Controllers\Api;

use App\Models\Carts;
use App\Http\Controllers\Controller;
use App\Models\CartItems;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class CartController extends Controller
{
    public function addToCart($cart,$item){
        $cartItem = new CartItems();
        $cartItem->cart_id = $cart;
        $cartItem->product_id = $item->product_id;
        $cartItem->quantity = $item->quantity;

        $cartItem->save();

        // update products instock

        $product = Products::find( $item->product_id);
        $product->instock = $product->instock - $item->quantity;
        $product->save();
    }


    public function item(Request $request){
        $user =  Auth::guard('sanctum')->user();
        $cart = Carts::where('customer_id', $user->id)->where('checkout', false)->first();
        if(!$cart){

            // if no cart create new 
            $cartn = new Carts();
            $cartn->customer_id = $user->id;
            $cartn->checkout = false;
            $cartn->delivered = false;
            $cartn->save();

            $this->addToCart($cartn->id, $request);

            return response()->json($cartn);
        }
        $this->addToCart($cart->id, $request);
        return response()->json($cart);
    }

    public function remove(Request $request)  {
        $user =  Auth::guard('sanctum')->user();

        CartItems::where('id', $request->id)->delete();

        return response()->json(['status'=>'item removed']);
    }

    public function list()  {
        $user =  Auth::guard('sanctum')->user();
        $cart = Carts::where('customer_id', $user->id)->where('checkout', false)->first();
        if(!$cart){
            $cartn = new Carts();
            $cartn->customer_id = $user->id;
            $cartn->checkout = false;
            $cartn->delivered = false;
            $cartn->save();

            $cart = $cartn;
        }

        $items =  CartItems::where('cart_id', $cart->id)->with('product')->get();

        return response()->json(['items'=>$items, 'cart'=>$cart]);
    }

    public function checkout(){
        $user =  Auth::guard('sanctum')->user();
        $cart = Carts::where('customer_id', $user->id)->where('checkout', false)->first();
        $cart->checkout = true;
        $cart->save();

        return response()->json(['status'=>'checked out']);
    }

    public function orders(){
        $user =  Auth::guard('sanctum')->user();
        $carts = Carts::where('customer_id', $user->id)->with('items.product')->get();

        return response()->json($carts);
    }
}