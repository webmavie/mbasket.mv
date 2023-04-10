<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Jackiedo\Cart\Cart;

class CartController extends Controller
{
    public function index()
    {
        $cart = (new Cart)->name('shopping');
        $items = $cart->getDetails()->get('items')->toArray();

        return view('cart.index', compact('items'));
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $quantity = $request->input('quantity', 1);

        $cart = (new Cart)->name('shopping');

        $cart->addItem([
            'id' => $product->id,
            'title' => $product->name,
            'quantity' => $quantity,
            'price' => $product->price,
            'extra_info' => [
                'image' => $product->images[0],
                'slug' => $product->slug,
            ],
        ]);

        return redirect()->back();
    }

    public function updateCart(Request $request)
    {
        $cart = (new Cart)->name('shopping');
        $quantity = $request->input('quantity', 1);
        $hash = $request->id;

        $cart->updateItem($hash, [
            'quantity' => $quantity,
        ]);

        return redirect()->route('cart.index');
    }

    public function removeFromCart($hash)
    {
        $cart = (new Cart)->name('shopping');
        $cart->removeItem($hash);

        return redirect()->route('cart.index');
    }
}
