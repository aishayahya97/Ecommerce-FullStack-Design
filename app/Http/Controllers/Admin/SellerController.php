<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    // List all sellers
    public function index()
    {
        $sellers = Seller::latest()->paginate(10);
        return view('admin.sellers.index', compact('sellers'));
    }

    // Show create form
    public function create()
    {
        return view('admin.sellers.create');
    }

    // Store seller
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:sellers,email',
            'phone' => 'nullable|string|max:20',
            'status' => 'required|boolean',
        ]);

        Seller::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.sellers.index')
            ->with('success', 'Seller added successfully.');
    }

    // Show edit form
    public function edit(Seller $seller)
    {
        return view('admin.sellers.edit', compact('seller'));
    }

    // Update seller
    public function update(Request $request, Seller $seller)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:sellers,email,' . $seller->id,
            'phone' => 'nullable|string|max:20',
            'status' => 'required|boolean',
        ]);

        $seller->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.sellers.index')
            ->with('success', 'Seller updated successfully.');
    }

    // Delete seller
    public function destroy(Seller $seller)
    {
        $seller->delete();
        return redirect()->route('admin.sellers.index')
            ->with('success', 'Seller deleted successfully.');
    }
}
