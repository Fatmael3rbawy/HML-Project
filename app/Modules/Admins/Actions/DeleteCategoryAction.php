<?php 

namespace Admins\Actions;
use Admins\Models\Category;

class DeleteCategoryAction 
{
    public function handel($id)
    {
        $category = Category::find($id);
        unlink(public_path('images/categories/') . $category->image);
        $category->delete();
    }
}