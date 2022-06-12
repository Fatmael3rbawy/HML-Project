<?php

namespace Admins\Http\Controllers;

use Admins\Actions\DeleteCategoryAction;
use Illuminate\Http\Request;
use Admins\Actions\StoreCategoryAction;
use Admins\Actions\UpdateCategoryAction;
use Admins\Http\Requests\Category\StoreCategoryRequest;
use Admins\Http\Requests\Category\UpdateCategoryRequest;
use Admins\Models\Category;
use App\Http\Controllers\Controller;

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
    public function store(StoreCategoryAction $action,StoreCategoryRequest $request)
    {
       $action->handel($request);
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
    public function update(UpdateCategoryAction $action ,UpdateCategoryRequest $request, $id)
    {
        $action->handel($request ,$id);
        return redirect(route('categories.index'))->with('message','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id ,DeleteCategoryAction $action)
    {   
       $action->handel($id);
        return back()->with('message', 'The category  deleted successfully');

    }
}