<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\UserOrder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        $order = UserOrder::count();
        $user = User::count();
        $product = Product::count();
        $pending = UserOrder::whereIn('status', ['pending', 'waiting'])->count();

        return view('web.admin.home.index', compact('order', 'user', 'product', 'pending'));
    }
}
