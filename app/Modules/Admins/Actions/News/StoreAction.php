<?php
namespace Admins\Actions\News;

use Admins\Models\NewsFeed;
use Illuminate\Http\Request;

class StoreAction
{
    public function execute(Request $request): void
    {
        $record =  NewsFeed::create([
            'name'       => $request->name,
            'details'      => $request->details,
            'created_by' => auth('admin')->user()->id,
        ]);

    }
}
