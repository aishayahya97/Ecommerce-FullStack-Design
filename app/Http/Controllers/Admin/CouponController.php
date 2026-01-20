<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    // List all coupons
    public function index()
    {
        $coupons = Coupon::paginate(15);
        return view('admin.coupons.index', compact('coupons'));
    }

    // Show create form
    public function create()
    {
        return view('admin.coupons.create');
    }

    // Store new coupon
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|unique:coupons,code',
            'discount_type' => 'required|in:fixed,percent',
            'discount_value' => 'required|numeric|min:0',
            'min_cart_amount' => 'nullable|numeric|min:0',
            'expiry_date' => 'nullable|date',
            'status' => 'required|boolean',
        ]);

        Coupon::create($request->all());

        return redirect()->route('admin.coupons.index')->with('success','Coupon added successfully.');
    }

    // Show edit form
    public function edit(Coupon $coupon)
    {
        return view('admin.coupons.edit', compact('coupon'));
    }

    // Update coupon
    public function update(Request $request, Coupon $coupon)
    {
        $request->validate([
            'code' => 'required|string|unique:coupons,code,' . $coupon->id,
            'discount_type' => 'required|in:fixed,percent',
            'discount_value' => 'required|numeric|min:0',
            'min_cart_amount' => 'nullable|numeric|min:0',
            'expiry_date' => 'nullable|date',
            'status' => 'required|boolean',
        ]);

        $coupon->update($request->all());

        return redirect()->route('admin.coupons.index')->with('success','Coupon updated successfully.');
    }

    // Delete coupon
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('admin.coupons.index')->with('success','Coupon deleted successfully.');
    }
}
