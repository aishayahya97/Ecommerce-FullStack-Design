<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SupplierRequest;

class SupplierRequestController extends Controller
{
    // Form submit method
    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'details' => 'nullable|string',
            'quantity' => 'nullable|integer',
            'unit' => 'nullable|string|max:10',
        ]);

        SupplierRequest::create([
            'user_id' => auth()->id() ?? null, // guest ke liye null
            'item_name' => $request->item_name,
            'details' => $request->details,
            'quantity' => $request->quantity,
            'unit' => $request->unit ?? 'Pcs',
        ]);

        return redirect()->back()->with('success', 'Your request has been sent to suppliers!');
    }
}
