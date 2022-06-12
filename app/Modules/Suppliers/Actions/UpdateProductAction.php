<?php 

namespace Suppliers\Actions;
use Suppliers\Models\Product;
use Suppliers\Models\Image;
use Suppliers\Http\Requests\Product\UpdateProductRequest;

class UpdateProductAction
{
    public function handel(UpdateProductRequest $request ,$id)
    {
        $product = Product::find($id);

        $images = $product->images;
        // check if admin upload images or not
        if ($request->hasFile('images')) {
            // check if product has images or not
            if ($images->isNotEmpty()) {

                foreach ($images as  $image) {
                    //delete images from products folder
                    unlink(public_path('images/products/') . $image->path);
                    //delete images from images table (database)
                    $image->delete();
                }
            }
            //store product images in public/images/products
            $images = $request->file('images');
            foreach ($images as $image) {
                $ext = $image->getClientOriginalExtension();
                $image_name = "product" . uniqid() . $ext;
                $image->move(public_path('images/products'), $image_name);
                //store product images inimages table (database)
                Image::create([
                    'path' =>  $image_name,
                    'product_id' => $id
                ]);
            }
        }

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);

    }
}