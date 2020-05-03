<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{Post, Comment};
use App\Http\Requests\StoreCommentFormRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Notifications\PostComment;

class CommentController extends Controller
{

    /**
     * @param StoreCommentFormRequest $request
     */
    public function store(StoreCommentFormRequest $request)
    {
        $comment = (object)null;
        try{
            DB::beginTransaction();
            $comment = $request->user()->Comment()->create($request->all());
            $author = $comment->Post->User;
            $author->notify(new PostComment($comment));
            DB::commit();
        }catch(\Exception $e){
            dd($e->getMessage());
            DB::rollBack();
        }


        return redirect()
            ->back()
            ->with('message', 'Comment registered with success!');

    }
}
