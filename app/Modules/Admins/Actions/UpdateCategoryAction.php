<?php 

namespace Admins\Actions;

use Admins\Http\Requests\Category\UpdateCategoryRequest;
use Admins\Models\Category;
use Illuminate\Support\Facades\Auth;

class UpdateCategoryAction 
{
    public function handel(UpdateCategoryRequest $request ,$id)
    {
        $category = Category::find($id);

        $image_name = $category->image;
        // check if admin upload image or not
        if ($request->hasFile('image')) {
            // check if category has image or not
            if ($image_name !== '' ) {
                unlink(public_path('images/categories/') . $image_name);
            }
            //store category image in public/images/categories
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $image_name = "category" . uniqid() . ".$ext";
            $image->move(public_path('images/categories'), $image_name);
        }
    
        $category->update([
           'name'=> $request->name,
           'image'=> $image_name
        ]);

       
    }
}