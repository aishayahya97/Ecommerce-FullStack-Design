<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    // List all carts
    public function index()
    {
        $carts = Cart::with('user', 'items.product')->paginate(15);
        return view('admin.carts.index', compact('carts'));
    }

    // Show single cart
    public function show(Cart $cart)
    {
        $cart->load('user', 'items.product');
        return view('admin.carts.show', compact('cart'));
    }

    // Update cart (admin can change quantity or status)
    public function update(Request $request, Cart $cart)
    {
        $request->validate([
            'status' => 'required|in:0,1',
            'items.*.quantity' => 'required|integer|min:1'
        ]);

        // Update cart status
        $cart->status = $request->status;
        $cart->save();

        // Update quantities
        if ($request->has('items')) {
            foreach ($request->items as $itemId => $itemData) {
                $cartItem = $cart->items()->find($itemId);
                if ($cartItem) {
                    $cartItem->quantity = $itemData['quantity'];
                    $cartItem->save();
                }
            }
        }

        return redirect()->route('admin.carts.show', $cart->id)->with('success', 'Cart updated successfully.');
    }
}
