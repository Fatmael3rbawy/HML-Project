<?php

namespace Suppliers\Http\Controllers;

use Admins\Models\Category;
use Illuminate\Http\Request;
use Suppliers\Http\Requests\Product\StoreProductRequest;
use Suppliers\Http\Requests\Product\UpdateProductRequest;
use Suppliers\Models\product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Suppliers\Models\Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('supplier.auth:supplier');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderby('id', 'desc')->paginate(10);
        return view('Suppliers::product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('Suppliers::product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
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

        return redirect(route('products.index'))->with('message', 'product created successfully');
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
        $categories = Category::all();
        $product = Product::find($id);
        return view('Suppliers::product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
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

        return redirect(route('products.index'))->with('message', 'product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $images = $product->images;
        //dd($images);
        foreach ($images as  $image) {
            unlink(public_path('images/products/') . $image->path);
        }
        $product->delete();
        return back()->with('message', 'The product  deleted successfully');
    }
}
