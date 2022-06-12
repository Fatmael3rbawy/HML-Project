<?php 

namespace Suppliers\Actions;

use Suppliers\Models\Product;

class DeleteProductAction
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