<?php

namespace Admins\Http\Controllers;
use Illuminate\Http\Request;
use Admins\Http\Requests\Category\StoreCategoryRequest;
use Admins\Http\Requests\Category\UpdateCategoryRequest;
use Admins\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderby('id','desc')->paginate(10);
        return view('Admins::Category.index',compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admins::Category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
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
        return redirect(route('categories.index'))->with('message','Category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('Admins::category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
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

        return redirect(route('categories.index'))->with('message','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        unlink(public_path('images/categories/') . $category->image);
        $category->delete();
        return back()->with('message', 'The category  deleted successfully');

    }
}