<?php 

namespace Suppliers\Actions;

use Illuminate\Support\Facades\Auth;
use Suppliers\Models\product;
use Suppliers\Models\Image;
use Suppliers\Http\Requests\Product\StoreProductRequest;

class StoreProductAction
{
    public function handel(StoreProductRequest $request)
    {
        
        $product = Product::create([
            "name" => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category,
            'supplier_id' => Auth::guard('supplier')->user()->id
        ]);

        if ($request->hasfile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $ext = $image->getClientOriginalExtension();
                $image_name = "product" . uniqid() . $ext;
                $image->move(public_path('images/products'), $image_name);

                Image::create([
                    'path' =>  $image_name,
                    'product_id' => $product->id
                ]);
            }
        }

    }
}