<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;

class CommentController extends Controller
{
    /**
     * Store a newly created comment in storage.
     *
     * @param Post $post
     * @return Response
     */
    public function createComment(Post $post)
    {
        $validator = $this->getCommentValidator();

        if ($validator->fails()) {
            return Redirect::to('blog/' . $post->id)->withPost($post)->withErrors($validator);
        }

        $comment = new Comment();
        $comment->setAttribute('user_id', Auth::id());
        $comment->setAttribute('post_id' , $post->id);
        $comment->setAttribute('comment', Input::get('comment'));
        $comment->save();

        return Redirect::to('blog/' . $post->id)->withPost($post)->withMessage('Your comment has been posted.');
    }

    /**
     * Get validator for comment input
     *
     * @return mixed
     */
    protected function getCommentValidator()
    {
        return Validator::make(Input::all(), [
            'comment' => 'required',
        ]);
    }
}
