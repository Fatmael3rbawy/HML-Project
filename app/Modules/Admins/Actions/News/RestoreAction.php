<?php
namespace Admins\Actions\News;;

use Admins\Models\NewsFeed;


class RestoreAction
{
    public function execute($id)
    {
        $record = NewsFeed::onlyTrashed()->find($id);
        
        $record->deleted_by = null;
        $record->save();
        $record->restore();
        return $record->id;
    }
}
