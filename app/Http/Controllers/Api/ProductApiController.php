<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\UserCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductApiController extends Controller
{
    function getCategory()
    {
        $category = Category::all();

        return response()->json([
            'message' => 'Data category berhasil diambil',
            'category' => $category,
        ]);
    }

    function getProductByCategory(Request $request)
    {
        $request->validate([
            'uuid' => 'required'
        ]);

        $category = Category::where($request->uuid)->first();
        $products =  Product::where('category_id', $category->id)->with(['images' => function ($query) {
            $query->first();
        }])->get();

        return response()->json([
            'message' => 'Data product berhasil diambil',
            'produts' => $products,
        ]);
    }

    function getProduct()
    {
        $products = Product::with('images')->get();

        return response()->json([
            'message' => 'Data product berhasil diambil',
            'products' => $products,
        ]);
    }

    function getProductDetail(Request $request)
    {
        $request->validate([
            'uuid' => 'required'
        ]);

        $product = Product::where('uuid', $request->uuid)->with('images')->first();

        return response()->json([
            'message' => 'Data product berhasil diambil',
            'detail' => $product,
        ]);
    }

    function getCart()
    {
        $cart = UserCart::where('user_id', Auth::user()->id)
            ->with(['product' => function ($query) {
                $query->with('images');
            }])
            ->get();

        return response()->json([
            'message' => 'Data keranjang berhasil diambil',
            'cart' => $cart,
        ]);
    }

    function addToCart(Request $request)
    {
        $request->validate([
            'uuid' => 'required'
        ]);

        $product = Product::where('uuid', $request->uuid)->first();
        if (!$product) {
            return response()->json([
                'message' => 'Product tidak ditemukan',
            ], 404);
        }

        $cartCheck = UserCart::where('product_id', $product->id)
            ->where('user_id', Auth::user()->id)
            ->first();

        if ($cartCheck) {
            $cartCheck->quantity += 1;
            $cartCheck->save();

            return response()->json([
                'message' => 'Product berhasil ditambahkan ke keranjang',
                'cart' => $cartCheck,
            ]);
        }

        $cart = UserCart::create([
            'user_id' => Auth::user()->id,
            'product_id' => $product->id,
            'quantity' => 1,
        ]);

        return response()->json([
            'message' => 'Product berhasil ditambahkan ke keranjang',
            'cart' => $cart,
        ]);
    }

    function deleteCart(Request $request)
    {
        $request->validate([
            'uuid' => 'required'
        ]);
        $product = Product::where('uuid', $request->uuid)->first();
        $cart = UserCart::where('product_id', $product->id)
            ->where('user_id', Auth::user()->id)
            ->first();
        if (!$cart) {
            return response()->json([
                'message' => 'Keranjang tidak ditemukan',
            ], 404);
        }
        if ($cart->user_id != Auth::user()->id) {
            return response()->json([
                'message' => 'Anda tidak memiliki akses untuk menghapus keranjang ini',
            ], 403);
        }
        $cart->delete();
        return response()->json([
            'message' => 'Keranjang berhasil dihapus',
        ]);
    }
}
