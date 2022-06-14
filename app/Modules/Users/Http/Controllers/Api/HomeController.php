<?php

namespace Users\Http\Controllers\Api;

use Suppliers\Models\product;
use App\Http\Controllers\Controller;
use App\Traits\GeneralTrait;
use Users\Http\Resources\ProductResource;

class HomeController extends Controller
{
    use GeneralTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $products = Product::orderby('id', 'desc')->paginate(10);
        return $this->returnData('Products', ProductResource::collection($products),'Successfull process');

    }
}