<?php

namespace Suppliers\Http\Controllers;

use Admins\Models\Category;
use Suppliers\Http\Requests\Product\StoreProductRequest;
use Suppliers\Http\Requests\Product\UpdateProductRequest;
use Suppliers\Models\product;
use App\Http\Controllers\Controller;
use Suppliers\Actions\StoreProductAction;
use Suppliers\Actions\UpdateProductAction;
use Suppliers\Http\Services\DeleteProductService;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('supplier:supplier');
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
    public function store(StoreProductRequest $request ,StoreProductAction $action)
    {
       $action->handel($request);
        return redirect(route('supplier.products.index'))->with('message', 'product created successfully');
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
    public function update(UpdateProductRequest $request, $id ,UpdateProductAction $action)
    {
       $action->handel($request ,$id);
        return redirect(route('supplier.products.index'))->with('message', 'product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id ,DeleteProductService $service)
    {
        $service->handel($id);
        return back()->with('message', 'The product  deleted successfully');
    }
}
