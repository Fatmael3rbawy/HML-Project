<?php 

namespace Admins\Actions;

use Admins\Http\Requests\Category\StoreCategoryRequest;
use Admins\Models\Category;
use Illuminate\Support\Facades\Auth;

class StoreCategoryAction 
{
    public function handel(StoreCategoryRequest $request)
    {
         //   dd( $request->validated() );

       //store image in public/images/categories
       $image = $request->file('image');
       $ext = $image->getClientOriginalExtension();
       $image_name = "category" . uniqid() . ".jpg";
       $image->move(public_path('images/Categories'), $image_name);

      Category::create([
           'name'=>$request->name,
           'image'=> $image_name,
           'admin_id'=> Auth::guard('admin')->user()->id
       ]
        );
    }
}