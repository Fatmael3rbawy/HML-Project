<?php

namespace Admins\Http\Controllers;

use Admins\Actions\News\TrashAction;
use Illuminate\Support\Facades\DB;
use Admins\Actions\News\StoreAction;
use Admins\Actions\News\UpdateAction;
use Admins\Actions\News\DeleteAction;
use Admins\Actions\News\RestoreAction;
use Admins\Http\Requests\News\StoreRequest;
use Admins\Models\NewsFeed;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $news = NewsFeed::orderby('id','desc')->paginate(10);
        $trashedNews = NewsFeed::onlyTrashed()->orderby('id','desc')->paginate(10);
        return view('Admins::news.index',compact('news' , 'trashedNews'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admins::news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAction $action,StoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $action->execute($request);
            DB::commit();
            return redirect()->route('admin.news.index')->with('success','Data has been saved successfully.');
        } catch (\Exception $exception) {
            DB::rollback();
            // dd($exception);
            return back()->with('error','Failed, Please try again later.')->withInput();
        }

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
        $news = NewsFeed::findOrFail($id);
        return view('Admins::news.edit',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAction $action ,StoreRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $action->execute($request, $id);
            DB::commit();
            return redirect()->route('admin.news.index')->with('success','Data has been saved successfully.');
        } catch (\Exception $exception) {
            DB::rollback();
            return back()->with('error','Failed, Please try again later.')->withInput();
        }
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id ,DeleteAction $action)
    { 
        DB::beginTransaction();
        try {
            $record =  $action->execute( $id);
            DB::commit();
            return back()->with('success', 'Data has been deleted successfully.');
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', 'Failed, Please try again later.');
        }  
     
    }

    public function trash( TrashAction $action ,$id)
    {
        DB::beginTransaction();
        try {
            $record =  $action->execute($id);
            DB::commit();
            return back()->with('success','Data moved to trash successfully.');
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', 'Failed, Please try again later.');
        }
    }

    public function restore( RestoreAction $action ,$id)
    {
        DB::beginTransaction();
        try {
            $record =  $action->execute($id);
            DB::commit();
            return back()->with('success', 'Data has been restored successfully.');
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', 'Failed, Please try again later.');
        }
    }

    private function countTrashes()
    {
        return NewsFeed::onlyTrashed()->count();
    }
}