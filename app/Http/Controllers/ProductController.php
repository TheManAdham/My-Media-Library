<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $maxFileSize = 2048; // 2MB

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:' . $maxFileSize,
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = 'images/'.$imageName;
        $product->user_id = Auth::id();
        $product->save();
        return redirect()->route('dashboard')->with('success', 'Product created successfully.');
    }
    public function destroy(Product $product)
    {
        // Delete the image file from the public folder
        if (File::exists(public_path($product->image))) {
            File::delete(public_path($product->image));
        }

        // Delete the product from the database
        $product->delete();

        return redirect()->route('dashboard')->with('success', 'Product deleted successfully.');
    }
    public function index(Request $request)
    {
        // Get the search term
        $search = $request->query('search');

        // Get the user's products that match the search term
        $products = Product::with('user')
            ->where('user_id', auth()->id())
            ->where(function($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%");
            })
            ->get();

        return view('dashboard', compact('products'));

    }
    public function download($id)
    {
        $product = Product::find($id);

        // Check if the product belongs to the authenticated user
        if ($product->user_id !== Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'You are not authorized to download this image.');
        }

        $path = public_path($product->image);
        return response()->download($path);
    }
}
