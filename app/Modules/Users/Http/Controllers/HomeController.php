<?php

namespace Users\Http\Controllers;

use Suppliers\Models\product;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderby('id', 'desc')->paginate(10);
        return view('Users::home', compact('products'));
    }
}