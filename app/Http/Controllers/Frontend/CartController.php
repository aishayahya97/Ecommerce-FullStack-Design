<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\SavedForLater;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $carts = auth()->user()
            ->carts()
            ->with('product')
            ->get()
            ->filter(fn($c) => $c->product);

        $savedForLater = auth()->user()
            ->savedForLater()
            ->with('product')
            ->get()
            ->filter(fn($s) => $s->product);

        $subtotal = $carts->sum(fn($c) => $c->product->price * $c->quantity);

        $discount = 0;
        if (Session::has('coupon')) {
            $coupon = Session::get('coupon');
            $discount = $coupon['type'] === 'fixed'
                ? $coupon['value']
                : ($subtotal * $coupon['value']) / 100;
        }

        $tax = 14;
        $total = max(0, $subtotal - $discount + $tax);

        return view('frontend.cart', compact(
            'carts',
            'savedForLater',
            'subtotal',
            'discount',
            'tax',
            'total'
        ));
    }

    // ✅ Add product to cart
    public function add(Product $product)
{
    $cartItem = Cart::where('user_id', auth()->id())
        ->where('product_id', $product->id)
        ->first();

    if ($cartItem) {
        // ✅ product already in cart → quantity +1
        $cartItem->increment('quantity');
    } else {
        // ✅ new product → new row
        Cart::create([
            'user_id'    => auth()->id(),
            'product_id' => $product->id,
            'quantity'   => 1,
            'status'     => 'active',
        ]);
    }

    return redirect()->route('cart.index')
        ->with('success', 'Product added to cart');
}


    // ✅ Remove single cart item
    public function remove(Cart $cart)
    {
        $cart->delete();
        return back()->with('success', 'Item removed');
    }

    // ✅ Clear cart
    public function clear()
    {
        auth()->user()->carts()->delete();
        Session::forget('coupon');
        return back()->with('success', 'Cart cleared');

    $userId = auth()->id();

    \App\Models\Cart::where('user_id', $userId)->delete();

    return redirect()->back()->with('success', 'Cart cleared successfully');
}

    

    public function saveForLater(Cart $cart)
{
    // security check
    if ($cart->user_id !== auth()->id()) {
        abort(403);
    }

    // avoid duplicate SAME product (optional)
    $exists = SavedForLater::where('user_id', auth()->id())
        ->where('product_id', $cart->product_id)
        ->exists();

    if (!$exists) {
        SavedForLater::create([
            'user_id'    => auth()->id(),
            'product_id' => $cart->product_id,
        ]);
    }

    // remove from cart
    $cart->delete();

    return back()->with('success', 'Item saved for later');
}
public function moveToCart(SavedForLater $savedItem)
{
    // security check
    if ($savedItem->user_id !== auth()->id()) {
        abort(403);
    }

    Cart::create([
        'user_id'    => auth()->id(),
        'product_id' => $savedItem->product_id,
        'quantity'   => 1,
        'status'     => 'active',
    ]);

    $savedItem->delete();

    return back()->with('success', 'Moved to cart');
}



    // ✅ Apply coupon
    public function applyCoupon(Request $request)
    {
        $request->validate(['coupon_code' => 'required']);

        $coupon = Coupon::where('code', $request->coupon_code)
            ->where('status', true)
            ->where(function ($q) {
                $q->whereNull('expiry_date')
                  ->orWhere('expiry_date', '>=', now());
            })
            ->first();

        if (!$coupon) {
            return back()->with('error', 'Invalid or expired coupon');
        }

        Session::put('coupon', [
            'code'  => $coupon->code,
            'type'  => $coupon->discount_type,
            'value' => $coupon->discount_value,
        ]);

        return back()->with('success', 'Coupon applied');
    }

    // ✅ Checkout
    public function processCheckout()
    {
        auth()->user()->carts()->delete();
        Session::forget('coupon');

        return redirect()
            ->route('cart.index')
            ->with('success', 'Order placed successfully');
    }

    public function update(Request $request, Cart $cart)
{
    $request->validate([
        'quantity' => 'required|integer|min:1|max:10'
    ]);

    $cart->update([
        'quantity' => $request->quantity
    ]);

    return back();
}



public function saveForLaterFromDetail($productId)
{
    $userId = auth()->id();

    // Cart se remove (agar maujood ho)
    Cart::where('user_id', $userId)
        ->where('product_id', $productId)
        ->delete();

    // Save for later me add
    SavedForLater::firstOrCreate([
        'user_id'    => $userId,
        'product_id' => $productId,
    ]);

    // ✅ Cart page par redirect
    return redirect()
        ->route('cart.index')
        ->with('success', 'Product saved for later');
}






}
