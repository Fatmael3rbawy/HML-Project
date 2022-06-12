<?php 

namespace Suppliers\Http\Services;
use Suppliers\Models\Product;

class DeleteProductService
{  
    public function handel($id)
    {
        
        $product = Product::find($id);
        $images = $product->images;
        //dd($images);
        foreach ($images as  $image) {
            unlink(public_path('images/products/') . $image->path);
        }
        $product->delete();
    }
}