<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserAddress;
use App\Models\UserCart;
use App\Models\UserOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class UserOrderController extends Controller
{
    function makeOrder()
    {
        $cart = UserCart::where('user_id', auth()->id())
            ->with('product')
            ->get();

        $address = UserAddress::where('user_id', auth()->id())->first();

        if (!$address) {
            return response()->json(['message' => 'Address not found, Please set your address'], 222);
        }

        if ($cart->isEmpty()) {
            return response()->json(['message' => 'Cart is empty'], 222);
        }

        $userOrder = new UserOrder();
        $userOrder->user_id = Auth::user()->id;
        $userOrder->order_number = Uuid::uuid4();
        $userOrder->name = $address->name;
        $userOrder->phone = $address->phone;
        $userOrder->address = $address->address;
        $userOrder->city = $address->city;
        $userOrder->country = $address->country;
        $userOrder->zip = $address->postal_code;
        $userOrder->status = 'pending';
        $userOrder->total = $cart->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
        $userOrder->save();
        foreach ($cart as $item) {
            $userOrder->items()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
            ]);

            // Delete the item from the cart after creating the order
            $item->delete();
        }

        return response()->json([
            'message' => 'Order created successfully',
            'order_number' => $userOrder->order_number,
            'total_price' => $userOrder->total,
            'products' => $userOrder->items->map(function ($item) {
                return [
                    'product_name' => $item->product->name,
                ];
            }),
        ]);
    }

    function getOrders()
    {
        $orders = UserOrder::where('user_id', auth()->id())
            ->with('items', function ($query) {
                $query->with('product');
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'message' => 'Orders retrieved successfully',
            'orders' => $orders->map(function ($order) {
                return [
                    'order_number' => $order->order_number,
                    'status' => $order->status,
                    'total_price' => $order->total,
                    'items' => $order->items->map(function ($item) {
                        return [
                            'product_name' => $item->product->name,
                            'quantity' => $item->quantity,
                            'price' => $item->product->price,
                        ];
                    }),
                    'created_at' => $order->created_at->format('Y-m-d H:i:s'),
                ];
            }),
        ]);
    }

    function getDetailOrder(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
        ]);

        $order = UserOrder::where('order_number', $request->order_id)
            ->where('user_id', auth()->id())
            ->with('items', function ($query) {
                $query->with('product');
            })
            ->first();

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        return response()->json([
            'message' => 'Order details retrieved successfully',
            'order' => [
                'order_number' => $order->order_number,
                'status' => $order->status,
                'total_price' => $order->total,
                'payment_proof' => $order->payment_proof ?? '-',
                'items' => $order->items->map(function ($item) {
                    return [
                        'product_name' => $item->product->name,
                        'quantity' => $item->quantity,
                        'price' => $item->product->price,
                    ];
                }),
                'created_at' => $order->created_at->format('Y-m-d H:i:s'),
            ],
        ]);
    }

    function uploadPaymentOrder(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        $order = UserOrder::where('order_number', $request->order_id)->first();

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $uuidImage = Uuid::uuid4();

        $paymentProof = $request->file('payment_proof');
        $paymentProof->storeAs('public/payment_proof', $uuidImage . '.' . $paymentProof->getClientOriginalExtension());

        $order->payment_proof = $uuidImage . '.' . $paymentProof->getClientOriginalExtension();
        $order->status = 'waiting';
        $order->save();

        return response()->json([
            'message' => 'Payment proof uploaded successfully',
        ]);
    }
}
