<?php
namespace Admins\Actions\News;
use Admins\Models\NewsFeed;

class TrashAction
{
    public function execute($id)
    {
        $record =  NewsFeed::find($id);
        $record->deleted_by = auth('admin')->user()->id;
        $record->save();
        $record->delete();
        return $record->id;
    }
}
