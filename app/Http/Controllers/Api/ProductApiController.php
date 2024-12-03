<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    function getCategory() {
        $category = Category::all();

        return response()->json([
            'message' => 'Data category berhasil diambil',
            'category' => $category,
        ]);
    }

    function getProductByCategory(Request $request) {
        $request->validate([
            'uuid'=>'required'
        ]);

        $category = Category::where($request->uuid)->first();
        $products =  Product::where('category_id',$category->id)->with(['images'=>function($query){
            $query->first();
        }])->get();

        return response()->json([
            'message' => 'Data product berhasil diambil',
            'produts' => $products,
        ]);
    }

    function getProduct() {
        $products = Product::with(['images'=>function($query){
            $query->first();
        }])->get();

        return response()->json([
            'message' => 'Data product berhasil diambil',
            'products' => $products,
        ]);
    }

    function getProductDetail(Request $request) {
        $request->validate([
            'uuid'=>'required'
        ]);

        $product = Product::where('uuid', $request->uuid)->with('category','images')->first();

        return response()->json([
            'message' => 'Data product berhasil diambil',
            'detail' => $product,
        ]);
    }
}
