<?php
namespace Admins\Actions\News;

use Admins\Models\NewsFeed;
use Illuminate\Http\Request;

class UpdateAction
{
    public function execute(Request $request ,$id): void
    {

        $record =  NewsFeed::find($id);
        $record->update([
            'name'       => $request->name,
            'details'      => $request->details,
        ]);

    }
}
