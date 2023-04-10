<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Jackiedo\Cart\Cart;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function products(Request $request)
    {
        $categories = Category::all();
        $products = Product::query();
        if ($request->has('category')) {
            $category = Category::where('slug', $request->get('category'))->first();
            if ($category) {
                $products = $products->where('category_id', $category->id);
            }
        }
        $products = $products->paginate(10);
        return view('products', compact('categories', 'products'));
    }

    public function product($slug)
    {
        $product = Product::where('slug', $slug)->first();
        if (!$product) abort(404);

        $product_in_cart = false;
        $cart = (new Cart)->name('shopping');
        $items = $cart->getDetails()->get('items')->toArray();
        foreach ($items as $item) {
            if ($item['id'] == $product->id) {
                $product_in_cart = true;
                break;
            }
        }
        return view('product', compact('product', 'product_in_cart'));
    }
}
