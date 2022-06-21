<?php
namespace Admins\Actions\News;

use Admins\Models\NewsFeed;
use Illuminate\Http\Request;

class DeleteAction
{
    public function execute($id): void
    {
        $record =  NewsFeed::onlyTrashed()->find($id);
        // dd($record);
        $record->forceDelete();   
    }
}
