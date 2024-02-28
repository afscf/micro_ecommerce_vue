<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request) {
        $user = $request->user();
        $quantity = $request->quantity;
        $product_id = $request->product_id;
        $product = Product::find($product_id);

        $user->cart()->create()->products()->attach($product, ['quantity' => $quantity]);

        return redirect()->back();
    }
    public function update(Request $request, Cart $cart) {
        $product_id = $request->product_id;
        $product = Product::find($product_id);
        $quantity = $request->quantity;

        if($cart->products->contains($product)) {
            $newQuantity = $cart->products->where('id', $product_id)->first()->pivot->quantity + $quantity;
            $cart->products()->updateExistingPivot($product, ['quantity' => $newQuantity]);
        } else {


            $cart->products()->attach($product, ['quantity' => $quantity]);
        }

        return redirect()->back();
    }
}
