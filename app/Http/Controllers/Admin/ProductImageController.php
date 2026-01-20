<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    public function destroy(ProductImage $image)
    {
         Storage::disk('public')->delete($image->image);
        $image->delete();
        return back()->with('success','Image deleted successfully.');
    }
}
